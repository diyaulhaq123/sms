<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use App\Models\School;
use App\Exports\Students;
use Illuminate\Support\Str;
use App\Imports\StaffImport;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use App\Mail\StaffRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreStaffRequest;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\AddTimeTableRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Notifications\HolidayNotification;
use App\Repositories\User\UserRepoInterface;
use Illuminate\Support\Facades\Notification;
use Unicodeveloper\Paystack\Facades\Paystack;
use App\Repositories\Admin\AdminRepoInterface;
use App\Repositories\Staff\StaffRepoInterface;
use App\Repositories\Student\StudentRepoInterface;
use App\Repositories\Guardian\GuardianRepoInterface;
use App\Repositories\Academics\AcademicsRepoInterface;
use App\Repositories\Staff\Teacher\TeacherRepoInterface;
use App\Repositories\Staff\Accountant\AccountRepoInterface;

class AdminController extends Controller
{
    private AdminRepoInterface $adminRepo;
    private Request $request;
    private UserRepoInterface $userRepo;
    private AcademicsRepoInterface $academicRepo;
    private StudentRepoInterface $studentRepo;
    private StaffRepoInterface $staffRepo;
    private TeacherRepoInterface $teacherRepo;
    private AccountRepoInterface $accountRepo;

    public function __construct(AdminRepoInterface $adminRepo, Request $request, UserRepoInterface $userRepo,
    AcademicsRepoInterface $academicRepo, StudentRepoInterface $studentRepo, StaffRepoInterface $staffRepo,
    TeacherRepoInterface $teacherRepo, AccountRepoInterface $accountRepo, GuardianRepoInterface $guardianRepo) {
        $this->adminRepo = $adminRepo;
        $this->$request = $request;
        $this->userRepo = $userRepo;
        $this->academicRepo = $academicRepo;
        $this->studentRepo = $studentRepo;
        $this->staffRepo = $staffRepo;
        $this->teacherRepo = $teacherRepo;
        $this->accountRepo = $accountRepo;
        $this->guardianRepo = $guardianRepo;
        $this->middleware('exception.handler');
    }


    // public function handleRequest($data, $success, $duplicate)
    // {
    //         try {
    //             // if($data){
    //                 $data;
    //                 return redirect()->back()->with('success', $success);
    //             // }
    //         } catch (\Exception $e) {
    //             if ($e->getCode() == 23000) {
    //                 return redirect()->back()->with('error', $duplicate);
    //             }
    //             return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
    //         }
    // }


    // PROFILE

    // Storage::disk('local')->delete('path/file.jpg' or the $request->());

    public function uploadAvatar(Request $request){
        $data = $request->validate(['avatar' => 'required|image']);
        // dd(auth()->user()->staff->id);
        try{
            if(auth()->user()->profile && auth()->user()->profile->avatar != ''){
                Storage::disk('public')->delete(auth()->user()->profile->avatar);
            }
            $ext = $request->file('avatar')->extension();
            $content = file_get_contents($request->file('avatar'));
            $filename = Str::random(25);
            $avatar = '/avatars/'.$filename.'.'.$ext;
            Storage::disk('public')->put($avatar, $content);
            $this->staffRepo->addAvatar(auth()->user()->id, $avatar);
            return redirect()->back()->with('success', 'Avatar was added');
        }catch(\Exception $e){
            Log::error($e->getMessage() . ' file: ' . $e->getFile() . ' line: ' . $e->getLine());
            return redirect()->back()->with('error', 'Could not add avatar, please update your profile and try again');
        }
    }

    // ENDS PROFILE



    // ************************* RESULT METHODS  *************************

    public function showResult(Request $request){
        $class_categories = $this->academicRepo->getClassCategory();
        $wings = $this->academicRepo->getWings();
        $sessions = $this->academicRepo->getSessions();
        $terms = $this->academicRepo->getTerms();
        return view('admin.search_result', compact('class_categories','wings','sessions','terms'));
    }

    public function getStudents(Request $request){
        $students = $this->studentRepo->getStudentsByFilter($request->class_id, $request->wing);
        return view('admin.jpost.students', compact('students'));
    }

    public function resultView(Request $request){
        $results = $this->academicRepo->getResult($request->student_id,$request->class_id,
        $request->session_id,$request->term_id);
        $student = $this->studentRepo->getById($request->student_id);
        $class = $this->academicRepo->getClassById($request->class_id);
        $session = $this->academicRepo->getSessionById($request->session_id);
        $term = $this->academicRepo->getTermById($request->term_id);
        $performance = $this->academicRepo->getPerformance($request->student_id,$request->class_id,
                        $request->session_id,$request->term_id,$request->wing);

        return view('admin.result_view', compact('performance','results','student','class','session','term'));
    }

    public function findResult(Request $request){

    }


     // ************************* END RESULT METHODS  *************************


    public function getStudentInfo(Request $request){
        $student = $this->studentRepo->getById($request->id);
        return view('admin.student-data', compact('student'));
    }

    public function studentInformation(Request $request)
    {
            if(empty($request->only('wing', 'class_id'))){
                $students = [];
            }else{
                try {
                    $students = $this->studentRepo->getStudentsByFilter($request->class_id, $request->wing);
                }catch (\Exception $e) {
                    return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
                }
            }
        $classes = $this->adminRepo->getClasses();
        $wings = $this->adminRepo->getWings();
        return view('admin.student-info', compact('request','classes','wings','students'));
    }

    public function dashboard(){
        // admin and account
        $latest_payments = $this->accountRepo->getLatestPayments();
        $term_payment = number_format($this->academicRepo->paymentCurrentTerm()->sum('paid'), 2);
        $session_payment = number_format($this->academicRepo->paymentCurrentSession()->sum('paid'), 2);
        $session = $this->academicRepo->getActiveSession();
        $term = $this->academicRepo->getActiveTerm();
        // guardian
        $my_children = count($this->guardianRepo->getChildren(auth()->user()->id));
        $total_payment_parent = count($this->guardianRepo->getPaymentsForChildren(auth()->user()->id));
        $students = count($this->studentRepo->get());
        $staffs = count($this->staffRepo->getStaffs());
        $teachers = count($this->staffRepo->getBytype('teacher'));
        $class_allocations = count($this->academicRepo->getClassAllocation());
        $subject_allocations = count($this->academicRepo->getSubjectAllocation());
        $payments = count($this->accountRepo->getPayment());
        return view('admin.dashboard', compact('payments','subject_allocations','class_allocations','teachers','students','staffs','session_payment','term_payment','session','term',
                        'my_children','total_payment_parent','latest_payments'));
    }

    // ***************   PERMISSIONS AND ROLES  *****************

    public function permissions(Request $request){
        $permissions = $this->adminRepo->getPermissions();
        if($request->id){
            $permission = $this->adminRepo->findPermission($request->id);
        }else{
            $permission = [];
        }
        return view('admin.permissions', compact('permissions','permission'));
    }

    public function createPermission(Request $request){
        $data = $request->validate(['name'=> 'required']);
        try{
            $this->adminRepo->createPermission($data);
            return redirect()->back()->with('success', 'Permission added');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding permission');
            Log::error($e->getMessage(). 'Line' .$e->getLine() . 'File' .$e->getFile());
        }

    }

    public function updatePermission(Request $request){
        $data = $request->validate(['name' => 'required']);
        try{
            $this->adminRepo->editPermission($request->id, $data);
            return redirect()->back()->with('success', 'Permission updated');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating permission');
            Log::error($e->getMessage(). 'Line' .$e->getLine() . 'File' .$e->getFile());
        }
    }

    public function deletePermission(Request $request){
        try{
            $this->adminRepo->deletePermission($request->permission);
            return redirect()->back()->with('success', 'Permission Deleted');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error deleting permission');
            Log::error($e->getMessage().'on'.$e->getLine());
        }
    }

    public function revokePermission(){
        $roles = $this->adminRepo->getRoles();
        $permissions = $this->adminRepo->getPermissions();
        $admin = $this->adminRepo->getMappings('admin');
        $account = $this->adminRepo->getMappings('accountant');
        $teacher = $this->adminRepo->getMappings('teacher');
        $guardians = $this->adminRepo->getMappings('guardian');
        $eos = $this->adminRepo->getMappings('eo');
        return view('admin.revoke-permission', compact('permissions', 'roles','admin','account','teacher','guardians','eos'));
    }

    public function revokePermissions(Request $request){
        try{
            $this->adminRepo->revokePermission($request->role,  $request->permission);
            return redirect()->back()->with('success', 'Permission revoked');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error revoking permission');
            Log::error($e->getMessage().'on'.$e->getLine());
        }

    }

    public function roles(Request $request){
        if($request->id){
            $role = $this->adminRepo->findRole($request->id);
        }else{
            $role = [];
        }
        $roles = $this->adminRepo->getRoles();
        return view('admin.roles', compact('roles','role'));
    }

    public function createRole(Request $request){
        $data = $request->validate(['name'=> 'required']);
        try{
            $this->adminRepo->createRole($data);
            return redirect()->back()->with('success', 'Role added');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding role');
            Log::error($e->getMessage(). 'Line' .$e->getLine() . 'File' .$e->getFile());
        }
    }

    public function updateRole(Request $request){
        $data = $request->validate(['name' => 'required']);
        try{
            $this->adminRepo->editRole($request->id, $data);
            return redirect()->back()->with('success', 'Role updated');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error updating role');
            Log::error($e->getMessage(). 'Line' .$e->getLine() . 'File' .$e->getFile());
        }
    }

    public function deleteRole(Request $request){
        try{
            $this->adminRepo->deleteRole($request->role);
            return redirect()->back()->with('success', 'Role Deleted');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error deleting role');
            Log::error($e->getMessage().'on'.$e->getLine());
        }
    }

    public function assignPermissionView(){
        $roles = $this->adminRepo->getRoles();
        $permissions = $this->adminRepo->getPermissions();
        $admin = $this->adminRepo->getMappings('admin');
        $account = $this->adminRepo->getMappings('accountant');
        $teacher = $this->adminRepo->getMappings('teacher');
        $guardians = $this->adminRepo->getMappings('guardian');
        $eos = $this->adminRepo->getMappings('eo');
        $users = $this->userRepo->getUsers();
        return view('admin.assign-permission', compact('users','permissions', 'roles','admin','account','teacher','guardians','eos'));
    }

    public function assignPermission(Request $request){
        try{
            DB::beginTransaction();
            //$this->adminRepo->assignPermissions($request->permission, $request->role);
            $this->adminRepo->assignPermission($request->role, $request->permission);
            DB::commit();
            return redirect()->back()->with('success', 'Permission was assigned');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error assigning permission');
            DB::rollback();
            Log::error($e->getMessage().'on'.$e->getLine());
        }
    }

    // public function revokeRole()

    public function assignRoleToUser(Request $request){
        $request->validate(['role'=> 'required', 'id'=>'required']);
        $this->adminRepo->assignRoleToUser($request->id, $request->role);
        return redirect(route('assign.permission.view'))->with('success', 'Role was assigned');
    }

        // ***************   PERMISSION AND  ROLES EDNS *****************

        // ***************   SETTINGS METHODS   *************



    public function profile(Request $request){
        $states = $this->studentRepo->getState();
        $lgas = $this->studentRepo->getLgas();
        return view('admin.profile', compact('states','lgas'));
    }

    public function settings(Request $request){
        $terms = $this->academicRepo->getTerms();
        $sessions = $this->academicRepo->getSessions();
        $schools = $this->academicRepo->getSchools();
        return view('admin.settings', compact('terms','sessions','schools'));
    }


    public function createSchool(Request $request){
        $data = $request->validate([
            'name'=>'required', 'logo' => 'required', 'slogan' => 'required', 'abbreviation' => 'sometimes',
            'phone' => 'required', 'email' => 'required', 'address' => 'required']);
        try{
            DB::beginTransaction();
            DB::commit();
            // $save =
            if($data && $request->logo != ''){
                $ext = $request->file('logo')->extension();
                $content = file_get_contents($request->file('logo'));
                $filename = Str::random(25);
                $logo = '/logo/'.$filename.'.'.$ext;
                Storage::disk('public')->put($logo, $content);
                $this->academicRepo->createSchool(['name'=> $request->name, 'logo' => $logo, 'slogan' => $request->slogan,
                'abbreviation' => $request->abbreviation, 'phone' => $request->phone, 'email' => $request->email, 'address' => $request->address]);
            }
            return redirect()->back()->with('success','School information saved');
        }catch(\Exception $e){
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('error','Error saving information'.$e->getMessage());
        }
    }

    public function activatSchool(Request $request){
        $request->validate(['school' => 'required','integer']);
        try{
            DB::beginTransaction();
            School::activateSchool($request->school);
            DB::commit();
            return redirect()->back()->with('success', 'School activated');
        }catch(\Excetion $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Error activating school');
            Log::error($e->getMessage());
        }
    }



        // ***************   SETTINGS METHODS ENDS  *************


        // ***************   VEHICLES METHODS ENDS  *************

    public function vehicles(Request $request){
        if($request->id){
            $vehicle = $this->adminRepo->findVehicle($request->id);
        }else{
            $vehicle = [];
        }
        $vehicles = $this->adminRepo->getVehicles();
        return view('admin.transport_vehicles', compact('vehicles','vehicle'));
    }

    public function createVehicle(Request $request){
        $data = $request->validate(['name'=>'required', 'plate_number'=>'required', 'seat_number' => 'required', 'date_of_use'=>'required']);
        try{
            DB::beginTransaction();
            $vehicle = $this->adminRepo->createVehicle($data);
            DB::commit();
            return redirect()->back()->with('success', 'Vehicle added');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error adding vehicle');
            DB::rollback();
            Log::error($e->getMessage().'on'. $e->getLine());
        }

    }

    public function editVehicle(Request $request){
        $data = $request->validate(['name'=>'required', 'plate_number'=>'required',  'seat_number' => 'required', 'date_of_use'=>'required']);
        try{
            DB::beginTransaction();
            $this->adminRepo->editVehicle($request->id,$data);
            DB::commit();
            return redirect()->back()->with('success', 'Vehicle updated');
        }catch(\Exception $e){
            if($e->getCode() == '23000'){
                return redirect()->back()->with('error', 'Duplicated Allocation!');
            }
            return redirect()->back()->with('error', 'An error occured:' .$e->getMessage());
            DB::rollback();
            Log::error($e->getMessage().'on'. $e->getLine());
        }
    }

    public function deleteVehicle(Request $request){
        $this->adminRepo->deleteVehicle($request->id);
        return redirect()->back()->with('success', 'Vehicle deleted');
    }

    public function vehicleAllocation(Request $request){
        if($request->id){
            $edit_allocation = $this->academicRepo->findBusAllocation($request->id);
        }else{
            $edit_allocation = [];
        }
        $routes = $this->academicRepo->getRoutes();
        $vehicles = $this->adminRepo->getVehicles();
        $allocations = $this->academicRepo->getBusAllocations();
        return view('admin.vehicle_allocation',compact('vehicles','routes','allocations','edit_allocation'));
    }

    public function createBusAllocation(Request $request){
        $data = $request->validate(
            ['route_id' => 'required', 'bus_id' => 'required'],
            ['route_id.required' => 'route name is required', 'bus_id.required' => 'please select a bus']
        );
       try{
        DB::beginTransaction();
        $this->academicRepo->createBusAllocation($data);
        DB::commit();
        return redirect()->back()->with('success', 'Allocation success!');
       }catch(\Exception $e){
        if($e->getCode() == '23000'){
            return redirect()->back()->with('error', 'Duplicated Allocation!');
        }
        DB::rollback();
        return redirect()->back()->with('error', 'Allocation error!');
        Log::error($e->getMessage(). 'File' .$e->getFile. 'Line'. $e->getLine());
       }
    }

    public function editBusAllocation(Request $request){
        $data = $request->validate(
            ['route_id' => 'required', 'bus_id' => 'required'],
            ['route_id.required' => 'route name is required', 'bus_id.required' => 'please select a bus']
        );
       try{
        DB::beginTransaction();
        $this->academicRepo->editBusAllocation($request->id, $data);
        DB::commit();
        return redirect()->back()->with('success', 'Allocation updated!');
       }catch(\Exception $e){
        DB::rollback();
        return redirect()->back()->with('error', 'Updated error!');
        Log::error($e->getMessage(). 'File' .$e->getFile. 'Line'. $e->getLine());
       }
    }

    public function deleteBusAllocation(Request $request){
        try{
            $this->academicRepo->deleteBusAllocation($request->id);
            return redirect()->back()->with('success', 'Deleted successfully!');
           }catch(\Exception $e){
            return redirect()->back()->with('error', 'error deleting allocation!');
            Log::error($e->getMessage(). 'File' .$e->getFile. 'Line'. $e->getLine());
           }
    }

    public function payTransport(Request $request){
        if($request->admission_no){
            $student = $this->studentRepo->getByAdmissionNo($request->admission_no);
        }else{
            $student = [];
        }
        $routes = $this->academicRepo->getRoutes();
        $payType = $this->accountRepo->PaymentTypeById(3);
        $session = $this->academicRepo->getActiveSession();
        $term = $this->academicRepo->getActiveTerm();
        return view('admin.pay_transport', compact('student','routes','payType','session','term'));
    }

    public function createStudentTransportation(Request $request){
        $request->validate(['payment_type_id' => 'required', 'student_id' => 'required', 'guardian_id' => 'required',
            'class_id' => 'required', 'ref_no' => 'required', 'session_id'=>'required', 'term_id' => 'required'],
            [
                'payment_type_id.required' => 'Payment type not identified', 'student_id.required' => 'student not identified',
                'guardian_id.required' => 'guardian info not identified', 'session_id.required' => 'session is required', 'term_id.required' => 'term is required'
            ]
        );
        try{
            $route = $this->academicRepo->findRouteBySession($request->route_id, $request->session_id);
            DB::beginTransaction();
            if($route){
                $this->accountRepo->createPayment([
                    'payment_type_id' => $request->payment_type_id,
                    'student_id' => $request->student_id,
                    'guardian_id' => $request->guardian_id,
                    'amount' => $route->amount,
                    'paid' => $route->amount,
                    'response' => 'success',
                    'class_id' => $request->class_id,
                    'ref_no' => $request->ref_no,
                    'session_id' => $request->session_id,
                    'term_id' => $request->term_id,
                ]);
                $this->academicRepo->createStudentRouteAllocation([
                    'student_id' => $request->student_id,
                    'route_id' => $route->id,
                    'session_id' => $request->session_id,
                    'term_id' => $request->term_id,
                ]);
            }else{
                return redirect()->back()->with('error', 'Incomplete parameters detected!');
            }
            DB::commit();
            return redirect()->back()->with('success', 'Payment and allocation was successful');
        }catch(\Exception $e){
            if($e->getCode() == '23000'){
                return redirect()->back()->with('error', 'Payment already exists');
            }
            DB::rollback();
            return redirect()->back()->with('error', 'Error completing payment'.$e->getMessage() . 'File:' . $e->getFile() . 'Line:' . $e->getLine());
            Log::error($e->getMessage() . 'File:' . $e->getFile() . 'Line:' . $e->getLine());
        }
    }

    public function editStudentTransportation(Request $request){
        try{
            DB::beginTransaction();
            // $this->adminRepo
            DB::commit();
            return redirect()->back()->with('success', 'Payment and allocation was updated');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Error updating payment');
            Log::error($e->getMessage() . 'File:' . $e->getFile() . 'Line:' . $e->getLine());
        }
    }

    public function deleteStudentTransportation(Request $request){
        try{
            // $this->adminRepo
            return redirect()->back()->with('success', 'Deleted successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error deleting payment');
            Log::error($e->getMessage() . 'File:' . $e->getFile() . 'Line:' . $e->getLine());
        }
    }


    // ***************   VEHICLES METHODS ENDS  *************


    public function getStaffInfoForUpdate(Request $request){
        $staff = $this->staffRepo->getById($request->id);
        $states = $this->studentRepo->getState();
        $staffId = $this->staffRepo->getActiveStaffFormat().'/'.date('y').'/'.$this->staffRepo->makeStaffId();
        return view('admin.jpost.staff_info_update', compact('staff','states','staffId'));
    }

    public function storeStaff(StoreStaffRequest $request){
        try{
            $this->staffRepo->create($request->validated());
            return redirect()->back()->with('success', 'Staff biodata was saved');
        }catch(\Exception $e){
            if($e->getCode() == 23000){
                return redirect()->back()->with('error', 'Duplicate entry or biodata exists');
            }
            return redirect()->back()->with('error', 'An error occured:'.$e->getMessage());
        }
    }


    public function addStaff(){
        $staffs = $this->staffRepo->getStaffs();
        return view('admin.add_staff', compact('staffs'));
    }

    public function createStaff(Request $request){
        $data = $request->validate(['name'=>'required','email'=>'required|email','phone'=>'required','type'=>'required']);
        try{
            $user = $this->userRepo->add([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'type' => $request->type,
                'password' => 'password'
            ]);
            if($user){
                Mail::to($request->email)->send(new StaffRegistration($request->name));
                $this->adminRepo->assignRoleToUser($user->id, $request->type);

                return redirect()->back()->with('success', 'Staff registered successfully');
            }
        }catch(\Exception $e){
            if($e->getCode() == 23000){
                return redirect()->back()->with('error', 'Duplicate entry not allowed for email');
            }
            return redirect()->back()->with('error', 'There was a problem '.$e->getMessage().' ');
        }
    }

    public function staffBulkUpload(Request $request){
        try{
            Excel::import(new StaffImport, $request->file);
            return redirect()->back()->with('success', 'Upload successful');
        }catch(\Exception $e){
            if($e->getCode() === '23000'){
                return redirect()->back()->with('error', 'Duplicate error');
            }
            return redirect()->back()->with('error', 'Could not upload file');
            Log::error($e->getMessage());
        }
    }

    public function updateStaff(){

        return view('admin.edit_staff');
    }

    public function getClassById(Request $request){
        $class = $this->academicRepo->getClassByCategory($request->id);
        return view('admin.jpost.classes', compact('class'));
    }

    public function getLga(Request $request){
        $lgas = $this->studentRepo->getLgaById($request->id);
        return view('admin.jpost.lga', compact('lgas'));
    }

    public function addStudent(){
        $admission_no = $this->studentRepo->generateAdmissinNo();
        $categories = $this->academicRepo->getClassCategory();
        $wings = $this->academicRepo->getWings();
        $states = $this->studentRepo->getState();
        return view('admin.add_student', compact('wings','categories','admission_no','states'));
    }

    public function createStudent(StoreStudentRequest $request)
    {
        $session = $this->academicRepo->getActiveSession()->id;

        try {
            $user = $this->userRepo->add([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'type' => $request->type
            ]);
            $student = $request->first_name.' '.$request->last_name;
            if ($user) {
                Mail::to($request->email)->send(new TestMail($request->email, $student));
                $this->studentRepo->add([
                    'session_id' => $session,
                    'admin_session' => $session,
                    'user_id' => $user->id,
                    'first_name' => $request->first_name,
                    'last_name' => $request->last_name,
                    'other_name' => $request->other_name,
                    'guardian_id' => $user->id,
                    'class_id' => $request->class_id,
                    'class_category_id' => $request->class_category_id,
                    'admission_no' => $request->admission_no,
                    'wing' => $request->wing,
                    'state_id' => $request->state_id,
                    'lga_id' => $request->lga_id,
                    'address' => $request->address
                ]);

                return redirect(route('add.student'))->with('success', 'Student was added');
            }
            return redirect(route('add.student'))->with('error', 'Student could not be added');
        } catch (\Exception $e) {
            if($e->getCode() == 23000){
                return redirect()->back()->with('error', 'Duplicate entry not allowed');
            }
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function updateStudent(){

        return view('admin.edit_student');
    }


    public function studentBulkUpload(Request $request){
        try{
            Excel::import(new StudentImport, $request->file);
        return redirect()->back()->with('success', 'Upload successful');
        }catch(\Exception $e){
            if($e->getCode() === '23000'){
                return redirect()->back()->with('error', 'Duplicate error');
            }
            return redirect()->back()->with('error', 'Could not upload file');
            Log::error($e->getMessage());
        }
    }

    // ******** Subject allocation methods ***********

    public function subjects(Request $request){
        $subject = [];
        if($request->id && $request->id != ''){
            $subject = $this->academicRepo->findSubject($request->id);
        }
        $subjects = $this->academicRepo->getSubjects();
        return view('admin.subjects', compact('subjects','subject'));
    }

    public function addSubject(Request $request){
        $data = $request->validate(['name'=>'required'],
        ['name.required' => 'Subject name is required']
        );
        try{
            DB::beginTransaction();
            DB::commit();
            $this->academicRepo->addSubject($data);
            return redirect()->back()->with('success', 'Subject was added');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Could not add subject!');
            Log::error($e->getMessage());
            DB::rollback();
        }
    }

    public function editSubject(Request $request){
        $data = $request->validate(['name'=>'required'],
        ['name.required' => 'Subject name is required']
        );
        try{
            DB::beginTransaction();
            DB::commit();
            $this->academicRepo->editSubject($request->id, $data);
            return redirect()->back()->with('success', 'Update Successfully');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Could not updated!');
            Log::error($e->getMessage());
            DB::rollback();
        }
    }

    public function deleteSubject(Request $request){
        try{
            $this->academicRepo->deleteSubject($request->id);
            return redirect()->back()->with('success', 'Subject Deleted!');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error deleting subject');
            Log::error($e->getMessage(). 'file:' . $e->getFile() .'line:'. $e->getLine);
        }
    }

    public function subjectAllocation(Request $request){
        $allocations = $this->academicRepo->getSubjectAllocation();
        $sessions = $this->academicRepo->getSessions();
        $terms = $this->academicRepo->getTerms();
        $classes = $this->academicRepo->getClasses();
        $subjects = $this->academicRepo->getSubjects();
        $staffs = $this->teacherRepo->getTeachers();
        if(empty($request->id)){
            $allocated = '' ;
        }else{
            $allocated = $this->academicRepo->findSubjectAllocation($request->id);
        }
        return view('admin.subject_allocations', compact('allocations','sessions','classes','terms','subjects','staffs','allocated'));
    }

    public function addSubjectAllocation(Request $request){
        $data = $request->validate(['staff_id'=>'required', 'session_id' => 'required', 'term_id'=> 'required', 'class_id' => 'required',
        'subject_id' => 'required'], ['session_id.required' => 'please select a session', 'term_id.required' => 'please select a term',
        'class_id.required' => 'please select a class', 'class_id.required' => 'please select a class' ]);
        try{
            $allocate = $this->academicRepo->addSubjectAllocation($data);
            if($allocate){
                return redirect()->back()->with('success', 'Allocation has been added');
            }
        }catch(\Exception $e){
            // if the error is a duplicate error
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error', 'Error occurred: Duplicate entry for allocation');
            }
            return redirect()->back()->with('error', 'Error occured');
            Log::error($e->getMessage(). 'file:'. $e->getFile(). 'line:' .$e->getLine);
        }

    }

    public function editSubjectAllocation(Request $request){
        $data = $request->validate(['staff_id'=>'required', 'session_id' => 'required', 'term_id'=> 'required', 'class_id' => 'required',
        'subject_id' => 'required'], ['session_id.required' => 'please select a session', 'term_id.required' => 'please select a term',
        'class_id.required' => 'please select a class', 'class_id.required' => 'please select a class' ]);
        try{
            $update = $this->academicRepo->editSubjectAllocation($request->id,$data);
            if($update){
            return redirect()->back()->with('success', 'Allocation has been updated');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('success', 'An error occured '.$e->getMessage().' ');
        }
    }

    public function deleteSubjectAllocation(Request $request){
        $this->academicRepo->deleteSubjectAllocation($request->id);
        return redirect()->back()->with('success', 'Subject allocation was deleted');
    }
     // ******** Subject allocation methods ends ***********


    // ************ Class Allocation methods  **************

    public function classAllocations(Request $request){
        $allocations = $this->academicRepo->getClassAllocation();
        $sessions = $this->academicRepo->getSessions();
        $classes = $this->academicRepo->getClasses();
        $staffs = $this->teacherRepo->getTeachers();
        $wings = $this->academicRepo->getWings();
        if(empty($request->id)){
            $allocated = '' ;
        }else{
            $allocated = $this->academicRepo->findClassAllocation($request->id);
        }
        return view('admin.class_allocations', compact('allocations','sessions','classes','staffs','allocated','wings'));
    }

    public function addClassAllocation(Request $request){
        $data = $request->validate(['staff_id'=>'required', 'session_id' => 'required','class_id' => 'required', 'wing'=>'required'],
        ['session_id.required' => 'please select a session', 'class_id.required' => 'please select a class', 'staff_id.required' => 'please select a class' ]);
        try{
            $allocate = $this->academicRepo->addClassAllocation($data);
            if($allocate){
                return redirect()->back()->with('success', 'Allocation has been added');
            }
        }catch(\Exception $e){
            // if the error is a duplicate error
            if ($e->getCode() == '23000') {
                return redirect()->back()->with('error', 'Error occurred: Duplicate entry for allocation');
            }
            return redirect()->back()->with('error', 'Error occured: '.$e->getMessage().' ');
        }

    }

    public function editClassAllocation(Request $request){
        $data = $request->validate(['staff_id'=>'required', 'session_id' => 'required','class_id' => 'required','wing'=>'required'],
        ['session_id.required' => 'please select a session', 'class_id.required' => 'please select a class', 'staff_id.required' => 'please select a class' ]);
        try{
            $update = $this->academicRepo->editClassAllocation($request->id,$data);
            if($update){
            return redirect()->back()->with('success', 'Allocation has been updated');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('success', 'An error occured '.$e->getMessage().' ');
        }
    }

    public function deleteClassAllocation(Request $request){
        $this->academicRepo->deleteClassAllocation($request->id);
        return redirect()->back()->with('success', 'Class allocation was deleted');
    }

    // ************ Class Allocation methods ends **************


    public function complaints(){
        $complaints = $this->adminRepo->getComplaints();
        return view('admin.complaints', compact('complaints'));
    }

    public function updateComplaint(Request $request){
        $request->validate(['id' => 'required']);
        try{
            $this->adminRepo->editComplaint($request->id, ['status' => 1]);
            return redirect()->back()->with('success', 'Complaint processed and resolved');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error processing complaint');
            Log::error($e->getMessage(). 'file' . $e->getFile() . 'Line' . $e->getLine);
        }
    }

    public function deleteComplaint(Request $request){
        try{
            $this->adminRepo->deleteComplaint($request->id);
            return redirect()->back()->with('success', 'Complaint Deleted');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error deleting complaint');
            Log::error($e->getMessage(). 'file' . $e->getFile() . 'Line' . $e->getLine);
        }
    }

    public function feeStructure(){

        $elem = $this->accountRepo->getFeesByClassCategory(1);
        $basic = $this->accountRepo->getFeesByClassCategory(2);
        $junior = $this->accountRepo->getFeesByClassCategory(3);
        $senior = $this->accountRepo->getFeesByClassCategory(2);
        return view('admin.fee-structure', compact('elem','basic','junior','senior'));
    }

    public function payments(Request $request){
        $pay_types = $this->accountRepo->paymentTypes();
        $collection = number_format($this->accountRepo->getPaymentForCurrentSession()->sum('paid'), 2);
        $terms = $this->academicRepo->getTerms();
        $sessions = $this->academicRepo->getSessions();
        $classes = $this->academicRepo->getClasses();
        if(empty($request->payment_type)){
            $payments = $this->accountRepo->getPaymentForCurrentSession();
        }else{
            // $payments = $this->accountRepo->getCurrentPaymentByType($request->payment_type);
            $payments = $this->accountRepo->getPaymentByParams('payment_type_id', 'class_id', 'session_id', 'term_id',
                        $request->payment_type, $request->class_id, $request->session_id, $request->term_id);
        }
        return view('admin.payments', compact('collection','pay_types','payments','sessions','terms','classes'));
    }

    public function updatePayment(){

        return view('admin.edit_payment');
    }


    // *********** PAYSTACK PAYMENT METHODS STARTS ************

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['error'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        dd($paymentDetails);
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }


    // *********** PAYSTACK PAYMENT METHODS ENDS ************


    public function makePayment(Request $request){
        $payment_types = $this->accountRepo->paymentTypes();
        $terms = $this->academicRepo->getTerms();
        $sessions = $this->academicRepo->getSessions();
        $current_session = $this->academicRepo->getActiveSession();
        $current_term = $this->academicRepo->getActiveTerm();
        if($request->student_id){
            $student = $this->studentRepo->getById($request->student_id);
            $student_classes = $this->adminRepo->getStudentsRecord($request->student_id);
        }else{
            $student = [];
            $student_classes = [];
        }
        $classes = $this->adminRepo->getClasses();
        $categories = $this->academicRepo->getClassCategory();
        $wings = $this->academicRepo->getWings();
        return view('admin.make_payment', compact('student_classes','wings','categories','classes','student','terms','sessions','current_session','current_term','payment_types'));
    }

    public function getPaymentInfo(Request $request){
        $amount = $this->accountRepo->getFeeByTypeSessionTerm($request->payment_type_id, $request->session_id, $request->term_id, $request->student_classes);
        if (!$amount) {
            $amount = '';
        }
        return view('admin.jpost.payment_info',compact('amount'));
    }

    public function createPayment(Request $request){
        $paid = '';
        $request->medium == 1 ? $paid = 'sometimes' : $paid = 'required';
        $data = $request->validate([
                'payment_type_id' => 'required|int',
                'student_id' => 'required|int',
                'guardian_id' => 'required|int',
                'session_id' => 'required|int',
                'term_id' => 'required|int',
                'class_id' => 'required|int',
                'paid' => $paid,
                'amount' => 'required|int',
                'ref_no' => 'required',
            ],
            [
                'amount.int' => 'No valid payment amount',
            ]
        );
        try{
            DB::beginTransaction();
            DB::commit();
                if($request->medium == 0){
                    $this->accountRepo->createPayment($data);
                    return redirect()->back()->with('success', 'Payment made successfully');
                }else{
                    $this->redirectToGateway();
                    // return redirect()->back()->with('success', 'Online payment....');
                }
        }catch(\Exception $e){
            if($e->getCode() === 23000){
                return redirect()->back()->with('error', 'Duplicate entry not allowed');
            }
            return redirect()->back()->with('error', 'Error: Payment failed');
            Log::error('Error:'.$e->getMessage().' File: '.$e->getFile().' Line: '.$e->getLine());
        }
    }





    public function promotion(){
        $classes = $this->academicRepo->getClasses();
        $session = $this->academicRepo->getActiveSession();
        return view('admin.promotion',compact('classes','session'));
    }

    public function promotionView(Request $request){
        $students =  $this->studentRepo->getStudentsClass($request->class_id);
        $session = $this->academicRepo->getActiveSession();
        $class = $this->academicRepo->getClassById($request->class_id);
        return view('admin.promote', compact('students','session','class'));
    }

    public function promoteStudent(Request $request){
        $data = $request->validate(['student_id' => 'required']);
        $class_id = $request->class_id+1;
        $session_id = $this->academicRepo->getActiveSession()->id;
        try{
            DB::beginTransaction();
            for ($i = 0; $i < count($request->student_id); $i++) {
                $session = $session_id;
                $id = $request->student_id[$i];
                $class = $class_id;
                $this->studentRepo->promoteStudents($id, ['session_id' => $session, 'class_id' => $class]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Students promoted');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Promotion failed!');
            Log::error($e->getMessage(). 'file:'. $e->getFile(). 'line:' . $e->getLine());
        }
    }

    public function demotionView(Request $request){
        $students =  $this->studentRepo->getStudentsClass($request->class_id);
        $session = $this->academicRepo->getActiveSession();
        $class = $this->academicRepo->getClassById($request->class_id);
        return view('admin.demote', compact('students','session','class'));
    }

    public function demoteStudent(Request $request){
        $data = $request->validate(['student_id' => 'required']);
        $session_id = $this->academicRepo->getActiveSession()->id;
        try{
            DB::beginTransaction();
            for ($i = 0; $i < count($request->student_id); $i++) {
                $session = $session_id;
                $id = $request->student_id[$i];
                $this->studentRepo->promoteStudents($id, ['session_id' => $session ]);
            }
            DB::commit();
            return redirect()->back()->with('success', 'Students demoted');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Demotion failed!');
            Log::error($e->getMessage(). 'file:'. $e->getFile(). 'line:' . $e->getLine());
        }
    }

    public function releaseResult(Request $request){
        $classes = $this->academicRepo->getClasses();
        $terms = $this->academicRepo->getTerms();
        $sessions = $this->academicRepo->getSessions();
        $results = $this->adminRepo->getReleasedResults();
        return view('admin.result_release', compact('classes','terms','sessions','results'));
    }

    public function toggleResult(Request $request){
        $this->adminRepo->toggleResult($request->id);
        $result = $this->adminRepo->findResult($request->id);
        if($result->status == 1){
        return redirect()->back()->with('success', 'Result was activated');
        }else{
            return redirect()->back()->with('success', 'Result was deactivated');
        }
    }

    public function addResult(Request $request){
        $data = $request->validate(['session_id' => 'required', 'term_id'=>'required','class_id' =>'required'],
        ['session_id.required' => 'Session is required', 'Class_id.required'=> 'class is required', 'term_id.required'=>
        'Term is required']);
        try{
            $result = $this->adminRepo->addResult($data);
            if($result){
                return redirect()->back()->with('success', 'Result has been released for requested class');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occured '. $e->getMessage() .' ');
        }
    }

    public function deleteResult(Request $request){
        try{
            $this->adminRepo->deleteResult($request->id);
            return redirect()->back()->with('success', 'Result was deleted');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Error deleting');
            Log::error($e->getMessage(). 'file' . $e->getFile() . 'Line:' .$e->getLine());
        }

    }

    public function sendTestEmail(Request $request){
        $user = 'Diyaulhaq';
        Mail::to($request->email)->send(new TestMail($request->email, $user));
        return redirect()->back()->with('success',"Email sent successfully!");
    }


    public function staffList(){

        return view('admin.staff_list');
    }

    public function studentList(Request $request){
        $classes = $this->academicRepo->getClasses();
        $wings = $this->academicRepo->getWings();
        if(empty($request->only('class_id','wing'))){
            $students = $this->studentRepo->get();
        }else{
            try{
                $students = $this->studentRepo->getStudentsByFilter($request->class_id, $request->wing);
                if(empty($students)){
                    return redirect()->back()->with('validate', 'Results not found');
                }else{
                    redirect()->back()->with('success', 'Results for search');
                }
            }catch(\Exception $e){
                return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
            }
        }
        return view('admin.student_list', compact('students','classes','wings'));
    }

    public function studentResult(Request $request){
        $wings = $this->academicRepo->getWings();
        $classes = $this->academicRepo->getClasses();
        $sessions = $this->academicRepo->getSessions();
        $terms = $this->academicRepo->getTerms();
        if($request->class_id && $request->wing){
            $students = $this->studentRepo->getStudentsByFilter($request->class_id, $request->wing);
            $class = $this->academicRepo->getClassById($request->class_id);
        }else{
            $students = [];
            $class = [];
        }
        return view('admin.student_results', compact('classes','wings','students','sessions','terms','class'));
    }

    // ***************   promotions  *************
    public function viewPromotion(){

        return view('admin.promotion');
    }

    // ***************   promotions  *************

    public function transportRoutes(Request $request){
        $routes = $this->academicRepo->getRoutes();
        $sessions = $this->academicRepo->getSessions();
        if(empty($request->id)){
            $route = '';
        }else{
            $route = $this->academicRepo->findRoute($request->id);
        }
        return view('admin.transport_routes', compact('sessions','routes','route'));
    }

    public function addRoutes(Request $request){
        $data = $request->validate(['session_id' => 'required', 'name' => 'required', 'amount' => 'required|numeric'],
        ['session_id.required' => 'Session is required']
        );
        try{
        $this->academicRepo->addRoutes($data);
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occured: .'.$e->getMessage().'. ');
        }
        return redirect()->back()->with('success', 'Route was added');
    }

    public function editRoutes(Request $request){
        $data = $request->validate(['session_id' => 'required', 'name' => 'required', 'amount' => 'required|numeric'],
        ['session_id.required' => 'Session is required']
        );
        try{
        $this->academicRepo->editRoutes($request->id, $data);
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An error occured: .'.$e->getMessage().'. ');
        }
        return redirect()->back()->with('success', 'Route was updated');
    }

    public function deleteRoute(Request $request){
        try{
            $delete = $this->academicRepo->deleteRoute($request->id);
            return redirect()->back()->with('success', 'Route was deleted');
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'Route could not be deleted');
            Log::error($e->getMessage(). 'File:' .$e->getFile() .'Line:'. $e->getLine() );
        }
    }

    public function admission(Request $request){
        $sessions = $this->academicRepo->getSessions();
        $admissions = $this->adminRepo->getAdmissions();
        if(empty($request->id)){
            $admission = '';
        }else{
            $admission = $this->adminRepo->findAdmission($request->id);
        }
        return view('admin.admissions',compact('sessions','admissions','admission'));
    }

    public function beginAdmission(Request $request){
        $data = $request->validate(['session_id'=>'required'], ['session_id.required' => 'Session is required']);
        try{
            $this->adminRepo->resetAdmissions();
            $this->adminRepo->beginAdmission($data);
            return redirect()->back()->with('success', 'Admission application has began');
        }catch(\Exception $e){
            if($e->getCode = 23000){
                return redirect()->back()->with('error', 'Duplicate admission application release');
            }
            return redirect()->back()->with('error', 'An error occured');
            Log::error($e->getMessage(). $e->getFile() . $e->getLine());
        }

    }

    public function closeAdmission(Request $request){
        $data = $request->validate(['id'=>'required']);
        try{
            $close = $this->adminRepo->closeAdmission($request->id);
            if($close){
                return redirect()->back()->with('success', 'Admission application has been closed');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('error', 'An closing admission' );
        }
    }

    public function toggleAdmission(Request $request){
        try{
            DB::beginTransaction();
            $this->adminRepo->resetAdmissions($request->id);
            DB::commit();
            return redirect()->back()->with('success', 'Admission opened Successful');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Error processing request');
            Log::error($e->getMessage(). 'File:'. $e->getFile() . 'Line:' .$e->getLine());
        }
    }

    // public function sendHolidayNotification(Request $request, $message){
    //     $curl = curl_init();
    //     $data = array("api_key" => "TLW6PWvdJBczTp4i9oE6WO9ZifV7JDpf0TBgEeklXJMLZgNDMyNK8kiBVHSu1Z", "sender_id" => "Acme",
    //     "usecase" => $message, "company" => "Hilinks" );

    //     $post_data = json_encode($data);

    //     curl_setopt_array($curl, array(
    //     CURLOPT_URL => "https://api.ng.termii.com/api/sender-id/request",
    //     CURLOPT_RETURNTRANSFER => true,
    //     CURLOPT_ENCODING => "",
    //     CURLOPT_MAXREDIRS => 10,
    //     CURLOPT_TIMEOUT => 0,
    //     CURLOPT_FOLLOWLOCATION => true,
    //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    //     CURLOPT_CUSTOMREQUEST => "POST",
    //     CURLOPT_POSTFIELDS => $post_data,
    //     CURLOPT_HTTPHEADER => array(
    //     "Content-Type: application/json"
    //     ),
    //     ));

    //     $response = curl_exec($curl);

    //     curl_close($curl);
    //     echo $response;
    // }

    public function applicationForm(Request $request){
        $session = $this->adminRepo->getApplicationSession();
        $term = $this->academicRepo->getActiveSession();
        $states = $this->studentRepo->getState();
        // $classes = $this->academicRepo->getClasses();
        $class_category = $this->academicRepo->getClassCategory();
        return view('admin.application_form', compact('session','term', 'states','class_category'));
    }

    public function createApplication(ApplicationRequest $request){
        $data = $request->validated();
        try{
            DB::beginTransaction();
            DB::commit();
            $this->adminRepo->addStudentApplication($data);
            return redirect()->back()->with('success', 'Application submitted!');
        }catch(\Exception $e){
            DB::rollback();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'Error submitting application');
        }

    }

    public function showApplications(Request $request){
        $applications = $this->adminRepo->showApplications();
        return view('admin.applications_list', compact('applications'));
    }

    public function showIdCard(Request $request){
        $student = $this->studentRepo->getById($request->id);
        return view('admin.id_card', compact('student'));
    }

    // *****************************  TIME TABLE  *****************************

    public function classTimeTable(Request $request){

        return view('admin.time_table.class');
    }

    public function staffTimeTable(Request $request){

        return view('admin.time_table.teachers');
    }

    public function timeTable(Request $request){
        $current_session = $this->academicRepo->getActiveSession();
        $current_term = $this->academicRepo->getActiveTerm();
        $classes = $this->academicRepo->getClasses();
        $subjects = $this->academicRepo->getSubjects();
        $wings = $this->academicRepo->getWings();
        $periods =  $this->academicRepo->getSchedulePeriods();
        $days =  $this->academicRepo->getDays();
        if($request->class_id && $request->wing){
            $schedules = $this->academicRepo->getClassTimetable( $request->class_id, $request->wing);
        }else{
            $schedules = [];
        }
        return view('admin.time_table.index', compact('schedules','current_session','current_term','classes','subjects','wings','days',
            'periods'));
    }

    public function createTimetable(AddTimeTableRequest $request){
        $data = $request->validated();
        try{
            DB::beginTransaction();
            DB::commit();
            $this->academicRepo->addSchedule($data);
            return redirect()->back()->with('success','Schedule was added');
        }catch(\Exception $e){
            DB::rollback();
            if($e->getCode() == '23000'){
                return redirect()->back()->with('error','Duplicate schedule not allowed');
            }
            return redirect()->back()->with('error','Could not add schedule');
            Log::error($e->getMessage());
        }
    }

    // public function getClassTimetable(Request $request){
    //     $moday_1st = $this->academicRepo->filterSchedule(1, 2, 1, $request->class_id, $request->wing);
    //     $schedules = $this->academicRepo->getClassTimetable($request->class_id, $request->wing);
    //     return view('admin.time_table.class',compact('schedules','moday_1st'));
    // }

    public function testt(Request $request){
        $export = new Students($request->class_id);
        return Excel::download($export, 'students.xlsx');
    }

    public function sendHolidayNotification(Request $request){
        $msg = $request->message;
        Notification::send( $this->userRepo->getGuardians(), new HolidayNotification($msg));
        return redirect()->back()->with('success', 'Notifications were sent!');
    }


    // *****************************  TIME TABLE ENDS  *****************************


    public function getStudent(Request $request){
        $student = $this->studentRepo->getById($request->id);
        return view('admin.jpost.student_data',compact('student'));
    }

    public function getGradeById(Request $request){
        $term = $this->teacherRepo->currentTerm();
        $session = $this->teacherRepo->currentSession();
        $grade = $this->teacherRepo->getGrades(auth()->user()->id,$session->id,$term->id,$request->id);
        return view('admin.jpost.get_gradebook', compact('grade'));
    }



    public function getStudentsData(){
        return $this->studentRepo->get();
    }

    public function createStudents(Request $request)
    {
        $data = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'other_name' => 'nullable|string|max:255',
                'guardian_id' => 'required|integer',
                'class_id' => 'required|integer',
                'class_category_id' => 'required|integer',
                'admission_no' => 'required|string',
                'wing' => 'required|string|max:1',
                'state_id' => 'required|integer',
                'lga_id' => 'required|integer',
                'address' => 'required|string',
                'session_id' => 'required|integer',
            ]);
        try {
            $this->studentRepo->add($data);
                return response()->json(['message' => 'Student was added!'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage().' file: '. $e->getFile().' line: '.$e->getLine());
            if($e->getCode() === '23000'){
                return response()->json(['message' => 'Duplicate entry not allowed for student registration number'], 500);
            }
            return response()->json(['message' => 'Could not add new student'], 500);
        }
    }

    public function updateStudents(Request $request)
    {
        $data = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'other_name' => 'nullable|string|max:255',
                'guardian_id' => 'required|integer',
                'class_id' => 'required|integer',
                'class_category_id' => 'required|integer',
                'admission_no' => 'required|string',
                'wing' => 'required|string|max:1',
                'state_id' => 'required|integer',
                'lga_id' => 'required|integer',
                'address' => 'required|string',
                'session_id' => 'required|integer',
            ]);
        try {
            $this->studentRepo->update($request->id,$data);
                return response()->json(['message' => 'Student was updated!'], 200);
        } catch (\Exception $e) {
            Log::error($e->getMessage().' file: '. $e->getFile().' line: '.$e->getLine());
            return response()->json(['message' => 'Could not update student'], 500);
        }
    }

    public function lessonPlans(Request $request){
        $lesson_plans = $this->teacherRepo->getLessonPlans();
        return view('admin.lesson_plans', compact('lesson_plans'));
    }

    public function viewLessonPlan(Request $request){
        $lesson_plan = $this->teacherRepo->findLessonPlan($request->id);
        return view('admin.view_lesson_plan', compact('lesson_plan'));
    }

    public function updateLessonPlan(Request $request){
        $request->validate(['id' => 'required', 'remark' => 'required']);
        try {
            $this->teacherRepo->updateLessonPlan($request->id,['remark' => $request->remark]);
                return redirect()->back()->with('success', 'Remark added');
        } catch (\Exception $e) {
            Log::error($e->getMessage().' file: '. $e->getFile().' line: '.$e->getLine());
            return redirect()->back()->with('danger', 'Error adding remark');
        }
    }


}

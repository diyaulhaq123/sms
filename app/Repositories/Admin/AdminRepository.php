<?php
namespace App\Repositories\Admin;
use App\models\User;
use App\Models\Wing;
use App\Models\Result;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Vehicle;
use App\Models\Admission;
use App\Models\Complaint;
use App\Models\Application;
use App\Models\StudentRecord;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Repositories\Admin\AdminRepoInterface;
 Class AdminRepository implements AdminRepoInterface
{
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }


    public function getVehicles(){
        return Vehicle::get();
    }

    public function findVehicle($id){
        return Vehicle::findOrFail($id);
    }

    public function createVehicle(array $data){
        return Vehicle::create($data);
    }

    public function editVehicle($id, array $data){
        $vehicle = Vehicle::findOrFail($id);
        return $vehicle->update($data);
    }

    public function deleteVehicle($id){
        $vehicle = Vehicle::findOrFail($id);
        return $vehicle->delete();
    }


    public function toggleResult($id){
        return Result::toggleResult($id);
    }

    public function findResult($id){
        return Result::findOrFail($id);
    }

    public function deleteResult($id){
        $result = Result::findOrFail($id);
        return $result->delete();
    }


    public function editResult($id, array $data){
        $result = Result::findOrFail($id);
        return $result->update($data);
    }

    public function addResult(array $data){
        return Result::create($data);
    }

    public function getReleasedResults(){
        return Result::with('class','session','term')->get();
    }

    public function deleteAdmission($id){
        return Admission::find($id)->delete();
    }

    public function findAdmission($id){
        return Admission::with('session')->findOrFail($id);
    }

    public function getAdmissions(){
        return Admission::with('session')->get();
    }

    public function beginAdmission(array $data){
        return Admission::create($data);
    }

    public function resetAdmissions($id){
        Admission::where('status', 1)->update(['status' => 0]);
        return Admission::where('id', $id)->update(['status' => 1]);
    }

    public function closeAdmission($id){
        return Admission::where('id', $id)->update(['status' => 0]);
    }

    public function createRole(array $data){
        return Role::create($data);
    }

    public function deleteRole($id){
        return Role::where('id', $id)->delete();
    }

    public function findRole($id){
        return Role::where('id', $id)->first();
    }

    public function editRole($id, array $data){
        return Role::where('id', $id)->update($data);
    }

    public function createPermission(array $data){
        return Permission::create($data);
    }

    public function deletePermission($id){
        return Permission::where('id', $id)->delete();
    }

    public function findPermission($id){
        return Permission::where('id', $id)->first();
    }

    public function editPermission($id, array $data){
        return Permission::where('id', $id)->update($data);
    }

    public function getRoles(){
        return Role::all();
    }

    public function getPermissions(){
        return Permission::all();
    }

    public function assignPermissions(array $permissions, $name){
        $role = Role::where('name', $name)->first();
        return $role->syncPermissions($permissions);
    }

    public function assignPermission($role, $permission){
        $role = Role::where('name', $role)->first(); // Find the role
        $permission = Permission::where('name', $permission)->first();
        if ($role && $permission) {
            return $role->givePermissionTo($permission); // Assign permission to the role
        }

        return false;
    }

    public function revokePermission($role, array $permission){
        $role = Role::where('name', $role)->first();
        return $role->revokePermissionTo($permission);
    }


    public function getMappings($name){
        return Permission::role($name)->get();
    }

    public function assignRoleToUser($id, $role){
        $user = User::find($id);
        return $user->assignRole($role);
    }

    public function getClasses(){
        return Classes::get();
    }

    public function getWings(){
        return Wing::get();
    }

    public function addStudentApplication(array $data){
        return Application::create($data);
    }

    public function deleteStudentApplication($id){
        $data = Application::findOrFail($id);
        return $data->delete();
    }

    public function showApplications(){
        return Application::with('class','classCategory', 'session', 'state','lga')->get();
    }

    public function getApplicationSession(){
        return Admission::where('status', 1)->firstOrFail();
    }

    public function getComplaints(){
        return Complaint::with('user','student')->get();
    }

    public function findComplaint($id){
        return Complaint::with('user','student')->where('id', $id)->find();
    }

    public function editComplaint($id, array $data){
        return Complaint::where('id', $id)->update($data);
    }

    public function createComplaint($id){
        return Complaint::create();
    }

    public function deleteComplaint($id){
        return Complaint::where('id', $id)->delete();
    }

    /**
     * return StudentRecord based on student_id and returns Student based on id
     *
     * @param integer $student_id
     * @return void
     */
    public function getStudentsRecord(int $student_id) {
        $student_rec = StudentRecord::with('session', 'class')
            ->select('class_id', 'session_id')
            ->where('student_id', $student_id)
            ->get();
        
        $student = Student::with('session', 'class')
            ->select('class_id', 'session_id')
            ->where('id', $student_id)
            ->first();
    
        if ($student_rec->isEmpty() || empty($student)) {
            $student_rec = [];
            $student = null;
        }
    
        // Extract the class relationship from each student record
        $student_rec_classes = $student_rec->map(function($record) {
            return $record->class;
        });
    
        $result = collect([$student ? $student->class : null])
        ->filter() // Remove null values
        ->merge($student_rec_classes)
        ->all();
        return $result;
    }
    
    

}

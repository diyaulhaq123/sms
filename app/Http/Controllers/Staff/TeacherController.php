<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Http\Requests\CreatePerfomanceRequest;
use App\Http\Requests\UpdatePerfomanceRequest;
use App\Repositories\Staff\StaffRepoInterface;
use App\Repositories\Staff\Teacher\TeacherRepoInterface;

class TeacherController extends Controller
{
    private $teacherRepo;
    private $staffRepo;
    // private $studentRepo;

    public function __construct(TeacherRepoInterface $teacherRepo, StaffRepoInterface $staffRepo){
        $this->teacherRepo = $teacherRepo;
        $this->staffRepo = $staffRepo;
        // $this->studentRepo = $studentRepo;
    }

    // /**
    // @return view for class allocated students
    //  **/
    public function viewClassStudents(Request $request)
    {
        return view('admin.teacher.class_allocated_student');
    }

    // /**
    // @return view for subject allocated students
    //  **/
    public function viewSubjectStudents(Request $request)
    {
        return view('admin.teacher.subject_allocated_student');
    }

    public function classAllocations(Request $request)
    {
        return view('admin.teacher.class_allocation');
    }

    public function subjectAllocations(Request $request)
    {
        $current_session = $this->teacherRepo->currentSession();
        $subject_allocations = $this->teacherRepo->getSubjectAllocationBySessionTerm(auth()->user()->id);
        return view('admin.teacher.subject_allocation', compact('subject_allocations','current_session'));
    }

    public function subjectGrading(Request $request)
    {
        $current_session = $this->teacherRepo->currentSession();
        $subject_allocations = $this->teacherRepo->getSubjectAllocationBySessionTerm(auth()->user()->id);
        return view('admin.teacher.add_grades', compact('subject_allocations','current_session'));
    }

    public function grading(Request $request)
    {
        // $current_session = $this->teacherRepo->currentSession();
        // $subject_allocations = $this->teacherRepo->getSubjectAllocationBySessionTerm(auth()->user()->id);
        return view('admin.teacher.add_grades', compact('subject_allocations','current_session'));
    }

    public function addGrades(Request $request){
        $subject_id = $request->subject_id;
        $class_id = $request->class_id;
        $term = $this->teacherRepo->currentTerm();
        $session = $this->teacherRepo->currentSession();
        $allocations = $this->teacherRepo->checkAllocation(auth()->user()->id,$request->class_id,$request->subject_id);
        $students = $this->teacherRepo->getAllocatedStudents($request->class_id);
        return view('admin.teacher.subject_allocated_student',compact('students','allocations','subject_id','class_id',
        'term','session'));
    }

    /**
    * @return create grade
    **/
    public function createGrade(CreateGradeRequest $request)
    {
        $data = $request->validated();
        try{
            DB::beginTransaction();
            $this->teacherRepo->createGrade($data);
            DB::commit();
            return redirect()->back()->with('success', 'Grades added');
        }catch(\Exception $e){
            if($e->getCode() === '23000'){
                return redirect()->back()->with('error', 'This Grading already exists');
            }
            DB::rollback();
            return redirect()->back()->with('error', 'Could not add grade');
            Log::error($e->getMessage());
        }
    }

    /**
    * @return edit grade
     **/
    public function editGrade(UpdateGradeRequest $request)
    {
        $data = $request->validated();
        try{
            DB::beginTransaction();
            $this->teacherRepo->editGrade($request->id,$data);
            DB::commit();
            return redirect()->back()->with('success', 'Grades updated');
        }catch(\Exception $e){
            // if($e->getCode() === '23000'){
            //     return redirect()->back()->with('error', 'This Grading already exists');
            // }
            DB::rollback();
            return redirect()->back()->with('error', 'Could not update grade'.$e->getMessage());
            Log::error($e->getMessage());
        }
    }

    /**
    * @return view for single student grade
     **/
    public function findGrade(Request $request)
    {

    }

    /**
    *@return delete student grade
     **/
    public function deleteGrade(Request $request)
    {

    }


    /**
    *@return create student performance
     **/
    public function createPerformance(CreatePerfomanceRequest $request)
    {
        $data = $request->validated();
        try{
            DB::beginTransaction();
            $this->teacherRepo->createPerformance($data);
            DB::commit();
            return redirect()->back()->with('success', 'Student performance added');
        }catch(\Exception $e){
            if($e->getCode() === '23000'){
                return redirect()->back()->with('error', 'This performance record already exists');
            }
            DB::rollback();
            return redirect()->back()->with('error', 'Could not add student performance:'.$e->getMessage());
            Log::error($e->getMessage());
        }
    }

    /**
    *@return edit student performance
     **/
    public function editPerformance(UpdatePerfomanceRequest $request)
    {
        $data = $request->validated();
        try{
            DB::beginTransaction();
            $this->teacherRepo->editPerformance($request->id, $data);
            DB::commit();
            return redirect()->back()->with('success', 'Student performance updated');
        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Could not update student performance'.$e->getMessage(). ' file: ' . $e->getFile() . ' line: ' .$e->getLine());
            Log::error($e->getMessage(). ' file: ' . $e->getFile() . ' line: ' .$e->getLine());
        }
    }

    /**
    *@return view for all student performance
     **/
    public function viewPerformance(Request $request)
    {
        $class_id = $request->class_id;
        $session = $this->teacherRepo->currentSession();
        $term = $this->teacherRepo->currentTerm();
        $wing = $request->wing;
        // $ = $this->teacherRepo->getClassAllocatedStudents(auth()->user()->id);
        $allocation = $this->teacherRepo->checkClassAllocation(auth()->user()->id,$request->class_id,$wing);
        $students = $this->teacherRepo->getAllocatedStudents($request->class_id);
        return view('admin.teacher.performance',compact('wing','class_id','term','session','students','allocation'));
    }


    /**
    *@return post id to retrieve data for a student performance
     **/
    public function viewEditPerformance(Request $request)
    {
        $class_id = $request->class_id;
        $session = $this->teacherRepo->currentSession();
        $term = $this->teacherRepo->currentTerm();
        $wing = $request->wing;
        $allocation = $this->teacherRepo->checkClassAllocation(auth()->user()->id,$request->class_id,$wing);
        $student = $this->teacherRepo->findPerformace($request->id);
        return view('admin.jpost.edit_performance',compact('wing','class_id','term','session','student','allocation'));
    }

      /**
    *@return view for class allocation
     **/
    public function viewClassAllocation(Request $request){
        $current_session = $this->teacherRepo->currentSession();
        $class_allocation = $this->teacherRepo->getClassAllocation(auth()->user()->id);
        return view('admin.teacher.class_allocation',compact('class_allocation','current_session'));
    }


    /**
    *@return view for single student performance
     **/
    public function findPerformance(Request $request)
    {

    }

    /**
    *@return delete student performance
     **/
    public function deletePerformance(Request $request)
    {

    }

    /**
    *@return attendance view
     **/
    public function attendance()
    {
        return view('admin.teacher.attendance');
    }

    /**
    *@return create attendance
     **/
    public function createAttendance(Request $request)
    {

    }

    /**
    *@return edit attendance
     **/
    public function editAttendance(Request $request)
    {

    }

    /**
    *@return delete attendance
     **/
    public function deleteAttendance(Request $request)
    {

    }


}

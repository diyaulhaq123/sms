<?php
namespace App\Repositories\Staff\Teacher;

use App\Models\Term;
use App\Models\User;
use App\Models\Classes;
use App\Models\Session;
use App\Models\Student;
use App\Models\Subject;
use App\Models\GradeBook;
use App\Models\LessonPlan;
use App\Models\ClassAllocation;
use App\Models\SubjectAllocation;
use App\Models\StudentPerformance;
use App\Repositories\Staff\Teacher\TeacherRepoInterface;
// use function PHPUnit\Framework\returnCallback;


Class TeacherRepository implements TeacherRepoInterface{

    // private $subject;
    // private $class;
    // private $subjectAllocation;
    // private $grade_book;
    // private $performance;
    // private $user;

    // public function __construct(User $user, Subject $subject, Classes $class, SubjectAllocation $subjectAllocation, GradeBook $grade_book,
    //     Performance $performance) {
    //     $this->subject = $subject;
    //     $this->class = $class;
    //     $this->subjectAllocation = $subjectAllocation;
    //     $this->grade_book  = $grade_book;
    //     $this->performance = $performance;
    //     $this->user = $user;
    // }


    /**
     * @return current Term
     */

    public function currentTerm(){
        return Term::where('status', 1)->firstOrFail();
    }

    /**
     * @return current session
     */
    public function currentSession(){
        return Session::where('status', 1)->firstOrFail();
    }

    /**
     * @return subject allocations by staff id
     */

    public function getSubjectAllocationBySession($staff_id){
        $session = $this->currentSession();
        return SubjectAllocation::with('class','subject','term','session','user','wing')
            ->where('staff_id', $staff_id)
            ->where('session_id', $session->id)
            ->get();
    }

    /**
     * @return allocations by session & term
     */
    public function getSubjectAllocationBySessionTerm($staff_id){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return SubjectAllocation::with('class','subject','term','session','user','wing')->where('staff_id', $staff_id)
        ->where('session_id', $session->id)
        ->where('term_id', $term->id)
        ->get();
    }

    public function getAllocatedStudents($class_id, $wing){
        return Student::where('class_id',$class_id)
        ->where('wing', $wing)
        ->get();
    }


    public function checkAllocation($staff_id,$class_id,$subject_id,$wing){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return SubjectAllocation::with('class','subject','term','session','user','wing')
            ->where('staff_id', $staff_id)
            ->where('wing', $wing)
            ->where('session_id', $session->id)->where('subject_id',$subject_id)
            ->where('term_id', $term->id)->where('class_id',$class_id)
            ->first();
    }

    public function confirmStudentsGrade($class_id,$student_id){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return GradeBook::where('staff_id', auth()->user()->id)
        ->where('session_id', $session->id)->where('student_id',$student_id)
        ->where('term_id', $term->id)->where('class_id',$class_id)->first();
    }

    /**
     * @return grade books uploads by staff id, session and term
     */
    public function getGrades($staff_id,$session_id,$term_id,$id){
        return GradeBook::with('term','session','student','subject','class')
        ->where('staff_id', $staff_id)
        ->where('session_id', $session_id)
        ->where('id', $id)
        ->where('term_id', $term_id)->firstOrfail();
    }

    /**
     * @return check class allocation by staff id, session id and term id
     */

    public function checkClassAllocation($staff_id,$class_id,$wing){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return ClassAllocation::with('class','session','staff')
        ->where('staff_id', $staff_id)
        ->where('session_id', $session->id)
        ->where('class_id',$class_id)->where('wing',$wing)
        ->first();
    }


     /**
     * @return get class allocation by staff id
     */
    public function getClassAllocation($staff_id){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return ClassAllocation::with('class','session','staff')
        ->where('staff_id', $staff_id)
        ->where('session_id', $session->id)
        ->first();
    }

    public function getClassAllocatedStudents($staff_id){
        $session = $this->currentSession();
        $allocation = ClassAllocation::with('class','session','staff')
        ->where('staff_id', $staff_id)
        ->where('session_id', $session->id)
        ->first();
        return $allocation;
    }

    /**
     * @return confirm if student have a performance for current session and term with student id
     */
    public function confirmStudentsPerformance($class_id,$student_id,$wing){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return StudentPerformance::where('staff_id', auth()->user()->id)
        ->where('session_id', $session->id)->where('student_id',$student_id)
        ->where('term_id', $term->id)->where('class_id',$class_id)
        ->where('wing', $wing)->first();
    }

    /**
     * @return performance by staff id, session id and term id
     */
    public function getPerformances($staff_id,$session_id,$term_id ){
        return StudentPerformance::where('staff_id', $staff_id)->where('session_id', $session_id)->get();
    }


    /**
     * @return get performance
     */
    public function findPerformace($id){
        $session = $this->currentSession();
        $term = $this->currentTerm();
        return StudentPerformance::with('student', 'term','session','class','staff')
        ->where('id',$id)
        ->where('session_id', $session->id)
        ->where('term_id', $term->id)
        // ->where('student_id', $student_id)
        ->firstOrFail();
    }

    /**
     * @return create performance
     */
    public function createPerformance(array $data){
        return StudentPerformance::create($data);
    }


    /**
     * @return edit student performance
     */
    public function editPerformance($id, array $data){
        return StudentPerformance::where('id', $id)->update($data);
    }


    /**
     * @return delete performance
     */
    public function deletePerformance($id, array $data){
        $performance = StudentPerformance::where('id',$id)
        ->findOrFail();
        return $performance->update($data);
    }

    /**
     * @return delete multiple performance
     */
    public function deleteMultiplePerformance($id, array $data){
        $performance = StudentPerformance::whereIn('id',$id);
        return $performance->delete($data);
    }

    /**
     * @return create makes entry into grade books
     */
    public function createGrade(array $data){
        return GradeBook::create($data);
    }

    /**
     * @return edit grade
     */
    public function editGrade($id, array $data){
        $grade = GradeBook::findOrFail($id);
        return $grade->update($data);
    }

    /**
     * @return delete grade
     */
    public function deleteGrade($id)
    {
        $grade = GradeBook::findOrFail($id);
        return $grade->delete();
    }

    /**
     * @return grades by id
     */
    public function findGrade($id){
        return GradeBook::where('id', $id)->findOrFail();
    }


    public function getTeachers(){
        return User::with('staff')->schoolScope()->where('type', 'teacher')->get();
    }


    /**
     * returns all lesson plan
     *
     * @return void
     */
    public function getLessonPlans(){
        return LessonPlan::with('staff','subject','class','profile')->get();
    }

    /**
     * creates new lesson plan
     *
     * @param array $data
     * @return void
     */
    public function createLessonPlan(array $data){
        return LessonPlan::create($data);
    }

    /**
     * updates lesson plan based on id
     *
     * @param integer $id
     * @param array $data
     * @return void
     */
    public function updateLessonPlan(int $id, array $data){
        return LessonPlan::where('id', $id)->update($data);
    }

    /**
     * return a single lesson plan based on its id
     *
     * @param integer $id
     * @return void
     */
    public function findLessonPlan(int $id){
        return LessonPlan::with('staff','subject','class','profile')->where('id', $id)->first();
    }

    /**
     * deletes lesson plan based on id
     *
     * @param integer $id
     * @return void
     */
    public function deleteLessonPlan(int $id){
        return LessonPlan::where('id', $id)->delete();
    }

    /**
     * returns lesson plan based on staff id
     *
     * @param integer $staff_id
     * @return void
     */
    public function getLessonPlanByStaff(int $staff_id){
        return LessonPlan::with('session','class','term','subject')
            ->where('staff_id', $staff_id)->get();
    }




}

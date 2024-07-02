<?php
namespace App\Repositories\Staff\Teacher;


use App\Models\Performance;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Term;

interface TeacherRepoInterface{


    /**
     * @return current Term
     */
    public function currentTerm();

    /**
     * @return current session
     */
    public function currentSession();

    /**
     * @return subject allocations by staff id
     */

    public function getSubjectAllocationBySession($staff_id);

    /**
     * @return allocations by session
     */
    public function getSubjectAllocationBySessionTerm($staff_id);

    public function getAllocatedStudents($class_id);
    public function checkAllocation($staff_id,$class_id,$subject_id);
    public function confirmStudentsGrade($class_id,$student_id);


    /**
     * @return grade books uploads by staff id, session and term
     */
    public function getGrades($staff_id,$session_id,$term_id,$id );

    /**
     * @return check class allocation by staff id, session id and term id
     */

     public function checkClassAllocation($staff_id,$class_id,$wing);


     /**
     * @return get class allocation by staff id
     */
    public function getClassAllocation($staff_id);

     /**
     * @return check class allocation by staff id, session id and term id
     */
    public function getClassAllocatedStudents($staff_id);

    /**
     * @return confirm if student have a performance for current session and term with student id
     */
    public function confirmStudentsPerformance($class_id,$student_id,$wing);

    /**
     * @return performance by staff id, session id and term id
     */
    public function getPerformances($staff_id,$session_id,$term_id );


    /**
     * @return get performance
     */
    public function findPerformace($id);

    /**
     * @return create performance
     */
    public function createPerformance(array $data);


    /**
     * @return edit student performance
     */
    public function editPerformance($id, array $data);


    /**
     * @return delete performance
     */
    public function deletePerformance($id, array $data);

    /**
     * @return delete multiple performance
     */
    public function deleteMultiplePerformance($id, array $data);

    /**
     * @return create makes entry into grade books
     */
    public function createGrade(array $data);

    /**
     * @return edit grade
     */
    public function editGrade($id, array $data);

    /**
     * @return delete grade
     */
    public function deleteGrade($id);

    /**
     * @return grades by id
     */
    public function findGrade($id);
}

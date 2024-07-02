<?php
namespace App\Repositories\Academics;


interface AcademicsRepoInterface{


    public function deleteClassAllocation($id);
    public function editClassAllocation($id, array $data);
    public function addClassAllocation(array $data);
    public function getClassAllocation();
    public function findClassAllocation($id);

    public function deleteSubjectAllocation($id);
    public function editSubjectAllocation($id, array $data);
    public function addSubjectAllocation(array $data);
    public function getSubjectAllocation();
    public function findSubjectAllocation($id);
    public function editRoutes($id, array $data);
    public function findRoute($id);
    public function findRouteBySession($id, $session_id);
    public function getRoutes();
    public function addRoutes(array $data);
    public function createStudentRouteAllocation(array $data);

    public function getSessions();
    public function getSessionById($id);
    public function getTerms();
    public function getTermById($id);

    public function getClasses();
    public function getClassByCategory($id);
    public function getClassById($id);
    public function getClassCategory();
    public function getWings();
    public function getSubjects();
    public function findSubject($id);
    public function addSubject(array $data);
    public function editSubject($id, array $data);
    public function deleteSubject($id);

    // *********************** Schools methods **********************
    public function findOrFail($id);
    public function getSchools();
    public function getActiveSchool();
    public function createSchool(array $data);
    public function editSchool($id, array $data);
    public function uploadLogo($id, $data);
    public function delete($id);

        // *********************** Schools methods ends **********************


    // *********************** Payment methods **********************

    public function getPayments();

    public function totalPayments();

    public function getPaymentById($id);

    public function getPaymentsByStatus($status);

    public function paymentCurrentSession();
    public function paymentCurrentTerm();

    public function paymentsBySession($session_id);

    public function paymentsByTermSession($session_id,$term_id);

    public function paidOrOutstandingPayment($value);

    public function paidOrOutstandingBySession($value);

    public function paidOrOutstandingByTerm($value);


    // *********************** Payment methods ends **********************

     // ************** RESULT METHODS  ****************
     public function getFormerStudent($student_id);
     public function checkReleaseResult($class_id);
     public function checkReleaseResults(array $class_id);
     public function getResult($student_id,$class_id,$session_id,$term_id);
     public function getPerformance($student_id,$class_id,$session_id,$term_id);
     public function resultStatus($class_id, $session_id, $term_id);

       // ************** RESULT METHODS ENDS ****************


        // ************** TIME TABLE SCHEDULE ****************

    public function addSchedule(array $data);
    public function findSchedule($id);
    public function updateSchedule($id, array $data);
    public function deleteSchedule($id, array $data);
    public function getSchedulePeriods();
    public function getDays();
    public function filterSchedule($start, $end, $day, $class_id, $wing);

     // ************** TIME TABLE SCHEDULE ENDS ****************


     public function createBusAllocation(array $data);

     public function findBusAllocation($id);

     public function getBusAllocations();

     public function editBusAllocation($id, array $data);

     public function deleteBusAllocation($id);

     public function checkPaymentStatus($pay_id, $student_id, $session, $term);

}

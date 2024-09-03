<?php
namespace App\Repositories\Academics;

use App\Models\Day;
use App\Models\Term;
use App\Models\Wing;
use App\Models\Result;
use App\Models\School;
use App\Models\Classes;
use App\Models\Payment;
use App\Models\Session;
use App\Models\Subject;
use App\Models\GradeBook;
use App\Models\TimeTable;
use App\Models\ScheduleTime;
use App\Models\BusAllocation;
use App\Models\ClassCategory;
use App\Models\StudentRecord;
use App\Models\TransportRoute;
use App\Models\ClassAllocation;
use App\Models\SubjectAllocation;
use App\Models\StudentPerformance;
use App\Models\StudentRouteAllocation;
use App\Repositories\Academics\AcademicsRepoInterface;


Class AcademicsRepository implements AcademicsRepoInterface
{
    private School $school;
    private Payment $payment;
    public function __construct(School $school, Payment $payment){
        $this->school = $school;
        $this->payment = $payment;
    }




    // class allocations methods starts

    public function deleteClassAllocation($id){
        return ClassAllocation::findOrFail($id)->delete();
    }

    public function editClassAllocation($id, array $data){
        $allocation = ClassAllocation::findOrFail($id);
        return $allocation->update($data);
    }

    public function addClassAllocation(array $data){
        return ClassAllocation::create($data);
    }

    public function getClassAllocation(){
        return ClassAllocation::with('staff','session','class')->get();
    }

    public function findClassAllocation($id){
        return ClassAllocation::with('staff','session','class')->findOrFail($id);
    }

    // class methods ends


    public function deleteSubjectAllocation($id){
        return SubjectAllocation::findOrFail($id)->delete();
    }

    public function editSubjectAllocation($id, array $data){
        $allocation = SubjectAllocation::findOrFail($id);
        return $allocation->update($data);
    }

    public function addSubjectAllocation(array $data){
        return SubjectAllocation::create($data);
    }

    public function getSubjectAllocation(){
        return SubjectAllocation::with('staff','session','term','class','subject','user','wing')->get();
    }

    public function findSubjectAllocation($id){
        return SubjectAllocation::with('staff','session','term','class','subject','user','wing')->findOrFail($id);
    }


    public function deleteRoute($id){
        return TransportRoute::findOrFail($id)->delete();
    }

    public function editRoutes($id, array $data){
        $route = TransportRoute::findOrFail($id);
        return $route->update($data);
    }

    public function findRoute($id){
        return TransportRoute::first($id);
    }

    public function findRouteBySession($id, $session_id){
        return TransportRoute::where('id', $id)
        ->where('session_id', $session_id)->first();
    }

    public function getRoutes(){
        return TransportRoute::with('session')->get();
    }

    public function addRoutes(array $data){
        return TransportRoute::create($data);
    }

    public function createStudentRouteAllocation(array $data){
        return StudentRouteAllocation::create($data);
    }

    public function getSessions(){
        return Session::get();
    }

    public function getSessionById($id){
        return Session::where('id', $id)->firstOrFail();
    }



    public function getTerms(){
        return Term::get();
    }

    public function getTermById($id){
        return Term::where('id', $id)->firstOrFail();
    }

    public function getActiveSession(){
        $result = Session::where('status', 1)->first();
        if($result){
            return $result;
        }
            return false;
    }

    public function getActiveTerm(){
        $result = Term::where('status', 1)->first();
        if($result){
            return $result;
        }
            return false;
    }


    public function getClasses(){
        return Classes::get();
    }

    public function getClassByCategory($id){
        return Classes::where('class_category_id', $id)->get();
    }

    public function getClassById($id){
        return Classes::where('id',$id)->firstOrFail();
    }

    public function getClassCategory(){
        return ClassCategory::where('status', 0)->get();
    }

    public function getWings(){
        return Wing::get();
    }

    public function getSubjects(){
        return Subject::where('status', 1)->get();
    }

    public function findSubject($id){
        return Subject::where('id', $id)->firstOrFail();
    }

    public function addSubject(array $data){
        return Subject::create($data);
    }

    public function editSubject($id, array $data){
        $subject = Subject::where('id', $id)->firstOrFail();
        return $subject->update($data);
    }

    public function deleteSubject($id){
        $data = Subject::where('id', $id)->firstOrFail();
        return $data->delete();
    }

    // *********************** Schools methods **********************

    public function findOrFail($id){
        return $this->school->findOrFail($id);
    }

    public function getSchools(){
        return $this->school->get();
    }

    public function getActiveSchool(){
        return $this->school->where('status', 1)->first();
    }

    public function createSchool(array $data){
        return $this->school->create($data);
    }

    public function editSchool($id, array $data){
        $data = $this->school->where('id', $id)->first();
        return $data->update($data);
    }

    public function uploadLogo($id, $data){
        $data = $this->school->where('id', $id)->first();
        return $data->update(['logo' => $data]);
    }

    public function delete($id){
        return $this->school->where('id', $id)->delete();
    }

    // ******************* School methods ends here *****************

    // ************** Payments methods starts ****************

    public function getPayments(){
        return $this->payment->get();
    }

    public function totalPayments(){
        $pay = $this->payment->where('payment_status', 'Paid')->get();
        return $pay;
    }

    public function getPaymentById($id){
        return $this->payment->findOrFail($id);
    }

    public function getPaymentsByStatus($status){
        return $this->payment->where('payment_status', $status)->where('session_id', $session_id)
        ->where('term_id', $term_id)->get();
    }

    public function paymentCurrentSession(){
        $session = $this->getActiveSession()->id;
        return $this->payment->where('session_id', $session)->get();
    }

    public function paymentCurrentTerm(){
        $term = $this->getActiveTerm()->id;
        $session = $this->getActiveSession()->id;
        return $this->payment->where('session_id', $session)->where('term_id', $term)->get();
    }

    public function paymentsBySession($session_id){
        return $this->payment->where('session_id', $session_id)->get();
    }

    public function paymentsByTermSession($session_id,$term_id){
        return $this->payment->where('session_id', $session_id)->where('term_id', $term_id)->get();
    }

    public function paidOrOutstandingPayment($value){
        return $this->payment->where('payment_status', $value)->get();
    }

    public function paidOrOutstandingBySession($value){
        $session = $this->getActiveSession()->id;
        return $this->payment->where('payment_status', $value)->where('session_id',$session)->get();
    }

    public function paidOrOutstandingByTerm($value){
        $term = $this->getActiveTerm()->id;
        $session = $this->getActiveSession()->id;
        return $this->payment->where('payment_status', $value)->where('session_id',$session)->
        where('term_id', $term)->get();
    }


    // ************** Payments methods ends ****************

    // ************** RESULT METHODS  ****************


    public function getFormerStudent($student_id){
        return StudentRecord::where('student_id', $student_id)
        ->get();
    }

    public function checkReleaseResults(array $class_id){
        return Result::with('session','term','class')->whereIn('class_id', $class_id)->get();
    }

    public function checkReleaseResult($class_id){
        return Result::with('session','term','class')->where('class_id', $class_id)->get();
    }

    public function getResult($student_id,$class_id,$session_id,$term_id){
        return GradeBook::with('student','class','session','term','subject')
        ->where('student_id', $student_id)
        ->where('class_id', $class_id)
        ->where('session_id', $session_id)
        ->where('term_id', $term_id)->get();
    }

    public function getPerformance($student_id,$class_id,$session_id,$term_id){
        return StudentPerformance::where('student_id', $student_id)
        ->where('class_id', $class_id)
        ->where('session_id', $session_id)
        // ->where('wing', $wing)
        ->where('term_id', $term_id)->first();
    }

    public function resultStatus($class_id, $session_id, $term_id){
        return Result::where('class_id', $class_id)
        ->where('session_id', $session_id)
        ->where('term_id', $term_id)
        ->exists();
    }

    // ************** RESULT METHODS ENDS ****************


    // ************** TIME TABLE SCHEDULE ****************

    public function addSchedule(array $data){
        return TimeTable::create($data);
    }

    public function findSchedule($id){
        return TimeTable::where('id',$id)->findOrFail();
    }

    public function updateSchedule($id, array $data){
        $schedule = TimeTable::where('id',$id)->findOrFail();
        return $schedule->update($data);
    }

    public function deleteSchedule($id, array $data){
        $schedule = TimeTable::where('id',$id)->findOrFail();
        return $schedule->delete($data);
    }


    public function getSchedulePeriods(){
        return ScheduleTime::where('status', 1)->get();
    }

    public function getDays(){
        return Day::where('status', 1)->get();
    }

    public function getClassTimetable($class_id, $wing){
        $session_id = $this->getActiveSession()->id;
        $term_id = $this->getActiveTerm()->id;
        return TimeTable::with('start_time','end_time','class','subject','days')
        ->orderBy('day', 'asc')->orderBy('start', 'asc')
        ->where('class_id', $class_id)
        ->where('wing', $wing)->where('session_id', $session_id)
        ->where('term_id', $term_id)->get();
    }

    public function filterSchedule($start, $end, $day, $class_id, $wing){
        return TimeTable::with('subject','class','start','end')->where('start', $start)->where('end', $end)
        ->where('day', $day)->where('class_id', $class_id)
        ->where('wing', $wing)->first();
    }
     // ************** TIME TABLE SCHEDULE ENDS ****************


     public function createBusAllocation(array $data){
        return BusAllocation::create($data);
     }

     public function findBusAllocation($id){
        return BusAllocation::with('bus','route')->where('id', $id)->first();
     }

     public function getBusAllocations(){
        return BusAllocation::with('bus','route')->get();
     }

     public function editBusAllocation($id, array $data){
        return BusAllocation::where('id', $id)->update($data);
     }

     public function deleteBusAllocation($id){
        return BusAllocation::where('id', $id)->delete();
     }

     public function checkPaymentStatus($pay_id, $student_id, $session, $term){
        return Payment::where('payment_type_id', $pay_id)
        ->where('payment_status', 'Paid')
        ->where('student_id', $student_id)
        ->where('session_id', $session)
        ->where('term_id', $term)->first();
    }


}

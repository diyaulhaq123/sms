<?php
namespace App\Repositories\Staff\Accountant;

use App\Models\Fee;
use App\Models\Term;
use App\Models\Payment;
use App\Models\Session;
use App\Models\Student;
use App\Models\PaymentType;
use App\Repositories\Staff\Accountant\AccountRepoInterface;


Class AccountRepository implements AccountRepoInterface{

    private $student;
    private $payment;
    public function __construct(Student $student, Payment $payment)
    {
        $this->student = $student;
        $this->payment = $payment;
    }

    public function getFeesByClassCategory($id){
        $ses = $this->currentSession()->id;
        return Fee::with('term', 'session', 'class')->where('class_category_id', $id)
        ->where('payment_type_id', 1)->where('session_id', $ses)->get();
    }

    public function paymentTypes(){
        return PaymentType::get();
    }

    /**
     * @return current session
     */
    public function currentSession(){
        return Session::where('status', 1)->firstOrFail();
    }

    /**
     * @return current term
     */
    public function currentTerm(){
        return Term::where('status', 1)->firstOrFail();
    }

    /**
     * @return Payments
     */
    public function getPayment()
    {
        return $this->payment->get();
    }

    /**
     * @return Payment by $id
     */
    public function findPayment($id)
    {
        return $this->payment->where('id', $id)->first();
    }

    /**
     * @return create Payment
     */
    public function createPayment(array $data)
    {
        return $this->payment->create($data);
    }

    /**
     * @return edit Payment
     */
    public function editPayment($id, array $data)
    {
        $payment = $this->payment->firstOrFail($id);
        return $payment->update($data);
    }

    /**
     * @return find Payment by student no
     */
    public function findPaymentByStudentNo($reg_no)
    {
        return $payment = $this->payment->where('reg_no', 'like', '%' . $reg_no . '%')->firstOrFail();
    }

    /**
     * @return payments for current session and term
     */
    public function getCurrentPayments(){
        return $this->payment->where('session_id', $this->currentSession()->id)->
        where('term_id', $this->currentTerm()->id)->get();
    }


    /**
     * @return payments for current session
     */

    public function getPaymentForCurrentSession(){
        return $this->payment->with('session','term', 'class','student','payment_type')->where('session_id', $this->currentSession()->id)->
        where('term_id', $this->currentTerm()->id)->get();
    }


    /**
     * @return payments for current session by type
     */

     public function getCurrentPaymentByType($type){
        return $this->payment->with('session','term', 'class','student','payment_type')->where('session_id', $this->currentSession()->id)->
        where('term_id', $this->currentTerm()->id)->where('payment_type_id', $type)->get();
    }

    /**
     * @return payments by $session_id, $term_id, $student_id
     */
    public function getPaymentByFilter($session_id, $term_id, $student_id)
    {
        $payment = $this->payment->where('session_id', $session_id)
            ->where('term_id', $term_id)->where('student_id', $student_id)->first();
        return $payment;
    }

    public function getPaymentByFilterClass($session_id, $term_id, $student_id, $class_id){
        $payment = $this->payment->where('session_id', $session_id)->where('class_id', $class_id)
            ->where('term_id', $term_id)->where('student_id', $student_id)
            ->where('payment_type_id', 1)->first();
        return $payment;
    }

    /**
     * @return payments by certain parameters
     */
    public function getPaymentByParams($param1, $param2, $param3, $param4, $val1, $val2, $val3, $val4)
    {
        $payment = Payment::where($param1, $val1)
            ->where($param2, $val2)
            ->where($param3, $val3)
            ->where($param4, $val4)
            ->get();
        return $payment;
    }

    /**
     * @return delete payments
     */

    public function delete($id)
    {
         $payment = $this->payment->firstOrFail($id);
        return $payment->delete();
    }

    /**
     * @return delete multiple payments
     */

    public function deleteMultiple($ids)
    {
        $payment = $this->payment->whereIn('id', $ids)->get($ids);
        return $payment->delete();
    }

    /**
     * @return payment by reference no
     */
    public function verifyPayment($ref_no)
    {
        return $this->payment->where('ref_no', $ref_no)->firstOrFail();
    }

    public function getLatestPayments(){
        return Payment::with('payment_type','class','student')->oldest()->take(10)->get();
    }

    public function PaymentTypeById($id){
        return PaymentType::where('id', $id)->first();
    }

    /**
     * return fees based on type, session and term
     *
     * @param integer $payment_type_id
     * @param integer $session_id
     * @param integer $term_id
     * * @param integer $class_id
     * @return void
     */
    public function getFeeByTypeSessionTerm(int $payment_type_id, int $session_id, int $term_id, int $class_id){
        return Fee::where('payment_type_id', $payment_type_id)
            ->where('session_id', $session_id)
            ->where('term_id', $term_id)
            ->where('class_id', $class_id)
            ->first();
    }

}

<?php
namespace App\Repositories\Staff\Accountant;



use App\Models\Payment;

interface AccountRepoInterface{


    public function getFeesByClassCategory($id);

    public function paymentTypes();

    /**
     * @return current session
     */
    public function currentSession();

    /**
     * @return current term
     */
    public function currentTerm();

    /**
     * @return Payments
     */
    public function getPayment();

    /**
     * @return Payment by $id
     */
    public function findPayment($id);

    /**
     * @return create Payment
     */
    public function createPayment(array $data);

    /**
     * @return edit Payment
     */
    public function editPayment($id, array $data);

    /**
     * @return find Payment by student no
     */
    public function findPaymentByStudentNo($reg_no);

    /**
     * @return payments for current session and term
     */
    public function getCurrentPayments();

    /**
     * @return payments for current session
     */
    public function getPaymentForCurrentSession();


    /**
     * @return payments for current session by type
     */

     public function getCurrentPaymentByType($type);

    /**
     * @return payments by $session_id, $term_id, $student_id
     */
    public function getPaymentByFilter($session_id, $term_id, $student_id);


    public function getPaymentByFilterClass($session_id, $term_id, $student_id, $class_id);


    /**
     * @return payments by certain parameters
     */
    public function getPaymentByParams($param1, $param2, $param3, $param4, $val1, $val2, $val3, $val4);

    /**
     * @return delete payments
     */

    public function delete($id);

    /**
     * @return delete multiple payments
     */

    public function deleteMultiple($ids);

    /**
     * @return payment by reference no
     */
    public function verifyPayment($ref_no);
    public function getLatestPayments();

    public function PaymentTypeById($id);

    public function getFeeByTypeSessionTerm(int $payment_type_id, int $session_id, int $term_id, int $class_id);


}

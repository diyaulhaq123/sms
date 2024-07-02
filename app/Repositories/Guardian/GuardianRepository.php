<?php
namespace App\Repositories\Guardian;

use App\Models\Payment;
use App\Models\Student;
use App\Repositories\Guardian\GuardianRepoInterface;

Class GuardianRepository implements GuardianRepoInterface
{

    // Log::error('An error occurred: ' . $e->getMessage());

    // returns the user/guardian children

    public function getChildren($id){
        return Student::with('class','class_category','state','lga')->where('guardian_id', $id)->get();
    }

     // returns all payments for a guardians child

     public function getPaymentsForChildren($guardian_id){
        $studentIds = $this->getChildren($guardian_id);
        $ids = [];
        foreach ($studentIds as $studentId) {
            $ids[] = $studentId->id;
        }
        $payments = Payment::with('student','payment_type', 'session', 'term', 'class')
                          ->whereIn('student_id', $ids)
                          ->get();
        return $payments;
    }


    // return all payment for individual students

    public function findChildPayment($student_id){
        return Payment::with('student','class','session','term','payment_type')->where('student_id', $student_id)
        ->get();
    }

    public function findStudent($id){
        return Student::findOrFail($id);
    }

    // payment of fees

    public function addPayment(Request $request){

    }



}

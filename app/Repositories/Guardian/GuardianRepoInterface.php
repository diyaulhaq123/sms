<?php
namespace App\Repositories\Guardian;

interface GuardianRepoInterface{


    public function getChildren($id);
    public function getPaymentsForChildren($guardian_id);
    public function findChildPayment($student_id);
    public function findStudent($id);

}

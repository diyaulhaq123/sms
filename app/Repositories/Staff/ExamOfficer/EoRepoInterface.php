<?php
namespace App\Repositories\Staff\ExamOfficer;

interface EoRepoInterface{


    public function getGradesBySession(int $class_id, int $session_id, int $term_id, string $subject_id);

}

<?php
namespace App\Repositories\Staff\ExamOfficer;
use App\Models\GradeBook;
use App\Repositories\Staff\ExamOfficer\EoRepoInterface;

class EoRepository implements EoRepoInterface{

    /**
     * return garde book based on the below parameters
     *
     * @param integer $class
     * @param integer $session
     * @param integer $term
     * @param string $wing
     * @param string $subject
     * @return void
     */
    public function getGradesBySession(int $class_id, int $session_id, int $term_id, string $subject_id){
        return GradeBook::with('student','staff','session','term','subject')
            ->where('class_id', $class_id)
            ->where('session_id', $session_id)
            ->where('term_id', $term_id)
            ->where('subject_id', $subject_id)
            ->get();
    }

}

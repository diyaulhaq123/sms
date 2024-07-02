<?php
namespace App\Repositories\Academics;

use App\Models\GradeBook;
use App\Repositories\Academics\GradeBookRepoInterface;

class GradeBookRepository implements GradeBookRepoInterface{

    private GradeBook $gradeBook;

    public function __construct(GradeBook $gradeBook){
        $this->gradeBook = $gradeBook;
    }

    public function getAll(){
        return $this->gradeBook->get();
    }

    public function getById($id){
        return $this->gradeBook->find($id);
    }

    public function getBySessionTerm($session, $term){
        return $this->gradeBook->where('session_id', $session)->where('term_id',$term)->get();
    }

    public function getGradesByClass($session, $term, $class){
        return $this->gradeBook->where('session_id', $session)->where('term_id',$term)->where('class_id', $class)->get();
    }

    public function getGradesByStudent($session, $term, $class, $student_id){
        return $this->gradeBook->where('session_id', $session)->where('term_id',$term)->where('class_id', $class)->
        where('student_id', $student_id)->get();
    }

    public function getByStaffId($session, $term, $staff_id){
        return $this->gradeBook->where('staff_id', $staff_id)->where('session_id', $session)->where('term_id',$term)->get();
    }

    public function create(array $data){
        return $this->gradeBook->create($data);
    }

    public function update($id,  array $data){
        return $this->gradeBook->update($id, $data);
    }



    public function delete($id){
        $grade = $this->gradeBook->whereIn('id', $id)->get();
        return $grade->delete();
    }

}

<?php
namespace App\Repositories\Academics;


interface GradeBookRepoInterface{

    public function getAll();

    public function getById($id);

    public function getBySessionTerm($session, $term);

    public function getGradesByClass($session, $term, $class);

    public function getGradesByStudent($session, $term, $class, $student_id);

    public function getByStaffId($session, $term, $staff_id);

    public function create(array $data);

    public function update($id,  array $data);

    public function delete($id);

}

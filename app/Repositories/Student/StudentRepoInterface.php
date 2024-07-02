<?php
namespace App\Repositories\Student;

interface StudentRepoInterface{

    public function get();
    public function getById($id);
    
    public function getByAdmissionNo($id);

    public function getStudentsByFilter($class_id, $wing);
    public function getStudentsClass($class_id);

    public function add(array $data);
    public function update($id, array $data);

    public function generateAdmissinNo();
    public function getState();
    public function getLgaById($id);
    public function getLgas();
    public function verifyChild($guardianId, $student_id);
    public function resultCalc($studentId, $termId, $sessionId, $class_id);
    
    public function promoteStudents($id, array $data);

}


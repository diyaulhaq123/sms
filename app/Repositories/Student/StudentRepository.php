<?php
namespace App\Repositories\Student;

use App\Models\Lga;
use App\Models\State;
use App\Models\Student;
use App\Models\GradeBook;
use App\Models\AdmissionFormat;
use Illuminate\Support\Facades\DB;
use App\Repositories\Student\StudentRepoInterface;

class StudentRepository implements StudentRepoInterface{

    private $student;

    public function __construct(Student $student){
        $this->student = $student;
    }

    public function get(){
        return Student::with('state','lga','guardian','class')->get();
    }

    public function getById($id){
        return Student::with('state','lga','guardian','class')->find($id);
    }

    public function getByAdmissionNo($id){
        return Student::with('state','lga','guardian','class')->where('admission_no', $id)->first();
    }
    
    public function getStudentsByFilter($class_id, $wing){
        return $this->student->where('class_id', $class_id)->where('wing', $wing)->get();
    }

    public function getStudentsClass($class_id){
        return $this->student->where('class_id', $class_id)->get();
    }

    public function add(array $data)
    {
        return $this->student->create($data);
    }

    public function update($id, array $data)
    {
        $result = $this->student->where('id',$id);
        if($result){
            return $result->update($data);
        }
        return false;
    }

    public function generateAdmissinNo()
    {
        $student = Student::latest('id')->firstOrFail();
        $get = explode('/',$student->admission_no);
        $format = AdmissionFormat::where('status', 1)->firstOrFail();
        $stu = end($get);
        $data = $format->name.'/'.date('y').'/'.$stu++;
        return $data;
    }

    public function getState(){
        return State::get();
    }


    public function getLgaById($id){
        return Lga::where('state_id', $id)->get();
    }

    public function getLgas(){
        return Lga::get();
    }

    public function verifyChild($guardianId, $student_id){
        return Student::where('guardian_id', $guardianId)->where('id', $student_id)->exists();
    }

    public function resultCalc($studentId, $termId, $sessionId, $class_id){
        // calculate the average
        return GradeBook::select('student_id', DB::raw('SUM(total) AS total_score'), DB::raw('COUNT(*) AS total_subjects'),
        DB::raw('term_id AS term'), DB::raw('session_id AS session'))
        ->where('student_id', $studentId)
        ->where('term_id', $termId)
        ->where('session_id', $sessionId)
        ->where('class_id', $class_id)
        ->groupBy('student_id','term_id','session_id')
        ->first();
    }

    public function promoteStudents($id, array $data){
        return Student::where('id', $id)->update($data);
    }

}


<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Student\StudentRepoInterface;
use App\Repositories\Academics\GradeBookRepository;
use App\Repositories\Staff\ExamOfficer\EoRepository;
use App\Repositories\Academics\AcademicsRepoInterface;

class ExamOfficerController extends Controller
{
    private AcademicsRepoInterface $academicRepo;
    private StudentRepoInterface $studentRepo;
    private EoRepository $eoRepo;
    private GradeBookRepository $gradebookRepo;

    public function __construct(AcademicsRepoInterface $academicRepo, StudentRepoInterface $studentRepo, EoRepository $eoRepo, GradeBookRepository $gradebookRepo){
        $this->academicRepo = $academicRepo;
        $this->studentRepo = $studentRepo;
        $this->eoRepo = $eoRepo;
        $this->gradebookRepo = $gradebookRepo;
    }

    public function uploadedGrades(Request $request){
        $classes = $this->academicRepo->getClasses();
        $terms = $this->academicRepo->getTerms();
        $sessions = $this->academicRepo->getSessions();
        $subjects = $this->academicRepo->getSubjects();
        $wings = $this->academicRepo->getWings();
        if($request->has('class')){
            $request->validate([
                'class' => 'required|int',
                'subject' => 'required|int',
                'term' => 'required|int',
                'session' => 'required|int',
            ]);
            $grades = $this->eoRepo->getGradesBySession($request->class, $request->session, $request->term, $request->subject);
            $class = $this->academicRepo->getClassById($request->class);
        }else{
            $grades = [];
            $class = [];
        }
        return view('admin.eo.uploaded_grades', compact('class','grades','wings','subjects','sessions','terms','classes'));
    }

    public function viewGrade(Request $request){
        $grade = $this->gradebookRepo->getById($request->id);
        return view('admin.jpost.eo_grade', compact('grade'));
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Student\StudentRepoInterface;
use App\Repositories\Guardian\GuardianRepoInterface;
use App\Repositories\Academics\AcademicsRepoInterface;
use App\Repositories\Staff\Accountant\AccountRepoInterface;

class GuardianController extends Controller
{
    private $guardianRepo;
    public function __construct(GuardianRepoInterface $guardianRepo, AcademicsRepoInterface $academicRepo, StudentRepoInterface $studentRepo,
                                AccountRepoInterface $accountRepo){
        $this->guardianRepo = $guardianRepo;
        $this->academicRepo = $academicRepo;
        $this->studentRepo = $studentRepo;
        $this->accountRepo = $accountRepo;
    }

    public function payments(Request $request){

        return view('admin.guardian.payments');
    }

    public function children(Request $request){

        $children = $this->guardianRepo->getChildren(auth()->user()->id);
        return view('admin.guardian.my_children', compact('children'));
    }

    public function findChildPayment(Request $request){
        $student = $this->guardianRepo->findStudent($request->id);
        $payments = $this->guardianRepo->findChildPayment($request->id);
        if($request->receipt_id){
            $receipt = $this->accountRepo->findPayment($request->receipt_id);
        }else{
            $receipt = [];
        }
        return view('admin.guardian.child_payment', compact('payments','student','receipt'));
    }

    public function result(Request $request){
        $student = $this->studentRepo->getById($request->id);
        $current_results = $this->academicRepo->checkReleaseResult($student->class_id);
        $previous_student = $this->academicRepo->getFormerStudent($student->id);
        $classIds = $previous_student->pluck('class_id')->toArray();
        $results = $this->academicRepo->checkReleaseResults($classIds);
        $terms = $this->academicRepo->getTerms();
        return view('admin.guardian.result', compact('terms','results','current_results','student'));
    }

    public function resultView(Request $request){
        $result_status = $this->academicRepo->resultStatus($request->class_id, $request->session_id, $request->term_id);
        $validate_child = $this->studentRepo->verifyChild(auth()->user()->id, $request->student_id);
        $results = $this->academicRepo->getResult($request->student_id,$request->class_id,
        $request->session_id,$request->term_id);
        $student = $this->studentRepo->getById($request->student_id);
        $class = $this->academicRepo->getClassById($request->class_id);
        $session = $this->academicRepo->getSessionById($request->session_id);
        $term = $this->academicRepo->getTermById($request->term_id);
        $performance = $this->academicRepo->getPerformance($request->student_id,$request->class_id,
                $request->session_id,$request->term_id,$request->wing);
        $statistics =  $this->studentRepo->resultCalc($request->student_id, $request->term_id, $request->session_id,$request->class_id);
        $payment = $this->accountRepo->getPaymentByFilterClass($request->session_id, $request->term_id, $request->student_id, $request->class_id);
        return view('admin.guardian.result_slip', compact('result_status','payment','statistics','validate_child','performance','results','student','class','session','term'));
    }

}

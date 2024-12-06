<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Lga;
use App\Models\Term;
use App\Models\User;
use App\Models\Wing;
use App\Models\State;
use App\Models\Result;
use App\Models\Classes;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ClassCategory;
use App\Models\StudentRecord;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\UpdateStudentRequest;
use App\Http\Requests\RegisterStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::select('id','name')->get();
        $wings = Wing::select('id','name')->get();
        $guardians = User::select('id','email','name')->where('type', 'guardian')->get();
        $students = Student::select('id','first_name')->get();
        return view('student.index', compact('students','classes','wings','guardians'));
    }

    public function getApiStudents(Request $request){
        $students = Student::with(['class', 'guardian']);

        $students->when($request->filled('class_id'), function ($q) use ($request) {
            return $q->where('class_id', $request->class_id);
        });

        $students->when($request->filled('guardian_id'), function ($q) use ($request) {
            return $q->where('guardian_id', $request->guardian_id);
        });

        $students->when($request->filled('wing'), function ($q) use ($request) {
            return $q->where('wing', $request->wing);
        });

        return DataTables::of($students)
            ->addColumn('class', function ($student) {
                return $student->class ? $student->class->name : 'N/A';
            })
            ->addColumn('guardian', function ($student) {
                return $student->guardian ? $student->guardian->name : 'N/A';
            })
            // ->addColumn('wing', function ($student) {
            //     return $student->wing ? $student->wing->name : 'N/A';
            // })
            ->addColumn('status', function ($student) {
                return $student->status == '1'
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">In-Active</span>';
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $guardians = User::select('id','email','name')->where('type', 'guardian')->get();
        $sessions = Session::select('id','name')->get();
        $terms = Term::select('id','name')->get();
        $states = State::select('id','name')->get();
        $lgas = Lga::select('id','name')->get();
        $classes = Classes::select('id','name')->get();
        $categories = ClassCategory::select('id','name')->get();
        $wings = Wing::select('id','name')->get();
        return view('student.create', compact('sessions','states','lgas','guardians','terms','classes','categories','wings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterStudentRequest $request)
    {
        try{
            DB::beginTransaction();
            DB::commit();
            Student::create($request->validated());
            return redirect()->back()->with('success', 'Student registered successfully');
        }catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Error saving information');
            Log::error($e->getMessage().' file: '.$e->getFile().' line: '.$e->getLine());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student_record = StudentRecord::select('student_id', 'class_id', 'session_id')->where('student_id', $student->id)->get();
        $class_ids = $student_record->pluck('class_id')->toArray();

        $results = Result::with('session','term','class')->whereIn('class_id', $class_ids)->whereIn('term_id', [1,2,3])->get();
        $result2 = Result::with('session','term','class')->where('class_id', $student->class_id)->whereIn('term_id', [1,2,3])->get();

        $classes = StudentRecord::with('class','session')->where('student_id', $student->id)->get();
        return view('student.show', compact('student','classes','results','result2'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $guardians = User::select('id','email','name')->where('type', 'guardian')->get();
        $sessions = Session::select('id','name')->get();
        $terms = Term::select('id','name')->get();
        $states = State::select('id','name')->get();
        $lgas = Lga::select('id','name')->get();
        $classes = Classes::select('id','name')->get();
        $categories = ClassCategory::select('id','name')->get();
        $wings = Wing::select('id','name')->get();
        return view('student.edit', compact('student','sessions','states','lgas','guardians','terms','classes','categories','wings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try{
            DB::beginTransaction();
            DB::commit();
            Student::where('id', $request->id)->update($request->validated());
            return redirect()->back()->with('success', 'Student updated successfully');
        }catch(Exception $e){
            DB::rollback();
            return redirect()->back()->with('error', 'Error saving information');
            Log::error($e->getMessage().' file: '.$e->getFile().' line: '.$e->getLine());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }

    public function getLgaById(Request $request){
        $lgas = Lga::where('state_id', $request->state_id)->get();
        return json_encode($lgas);
    }


    public function getClassesByCategory(Request $request){
        $data = Classes::where('class_category_id', $request->class_category_id)->get();
        return json_encode($data);
    }



}

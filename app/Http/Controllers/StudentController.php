<?php

namespace App\Http\Controllers;

use App\Models\Lga;
use App\Models\Term;
use App\Models\User;
use App\Models\Wing;
use App\Models\State;
use App\Models\Classes;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ClassCategory;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $guardians = User::select('id','email','name')->where('type', $guardian)->get();
        return view('student.index');
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\GradeBook;
use Illuminate\Http\Request;

class GradeBookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(GradeBook $gradeBook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GradeBook $gradeBook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GradeBook $gradeBook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GradeBook $gradeBook)
    {
        //
    }


    public function getStudentResult(Request $request){
        $data = GradeBook::where([
            'student_id' => $request->student_id,
            'class_id' => $request->class_id,
            'session_id' => $request->session_id,
            'term_id' => $request->term_id,
        ])->get();
        return json_encode($data);
    }


}

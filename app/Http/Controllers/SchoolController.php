<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function getSchool(){
        return $school = School::where('status', 1)->first();

    }
}

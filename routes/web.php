<?php

use App\Models\Session;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeBookController;
use App\Http\Controllers\PortalSettingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/api/get-lgas/{state_id}', [StudentController::class, 'getLgaById']);

Route::get('/api/get-class/{class_category_id}', [StudentController::class, 'getClassesByCategory']);

Route::middleware('auth')->group(function () {

    Route::resource('portal_settings', PortalSettingController::class);
    Route::resource('sessions', SessionController::class);
    Route::put('toogle-session/{id}', [SessionController::class, 'toogleStatus']);
    Route::resource('terms', TermController::class);
    Route::put('toogle-term/{id}', [TermController::class, 'toogleStatus']);
    Route::resource('student', StudentController::class);
    Route::get('/api/students', [StudentController::class, 'getApiStudents']);

    Route::get('/student/result-slip/{student_id}/{class_id}/{session_id}/{term_id}', [GradeBookController::class, 'getStudentResult'])->name('get.result');




    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

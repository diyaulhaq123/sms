<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('loginn', [ApiController::class, 'login']);

Route::controller(AdminController::class)->group(function () {
        
    Route::get('get/students', 'getStudentsData')->name('get.students');

    Route::post('create/students', 'createStudents');
    Route::patch('update/students/{id}', 'updateStudents');
        
});


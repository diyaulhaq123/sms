<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CaledarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\Staff\TeacherController;
use App\Http\Controllers\Staff\ExamOfficerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/403', function () {
    return view('errors.403');
});

Route::get('/application/admissions', [AdminController::class, 'applicationForm'])->name('application.admissions');
Route::post('/application/submited', [AdminController::class, 'createApplication'])->name('application.create');

Route::middleware('auth')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::patch('/change-password', 'changePassword')->name('change.password');
        Route::post('createOrUpdate', 'createUpdateProfile')->name('save.profile');
    });

    Route::controller(CaledarController::class)->group(function(){
        Route::middleware('role:admin')->group(function () {
            Route::post('calendar', 'createEvent')->name('add.calendar');
            Route::get('events', 'events')->name('events');
            Route::patch('events', 'updateEvent')->name('edit.calendar');
            Route::post('event-form', 'editEvent')->name('edit.event');
            Route::post('event', 'deleteEvent')->name('delete.event');
        });
    });


    Route::controller(TeacherController::class)->group(function(){

        //   ***********   Routes for only admin, eo & teachers access    ***********
        Route::middleware('role:admin,teacher,eo')->group(function () {


            Route::get('/allocated/subject', 'subjectAllocations')->name('allocated.subject');
            Route::get('/subject/grading', 'subjectGrading')->name('subject.grading');
            Route::get('/gradings/{class_id}/{subject_id}/{wing}', 'addGrades')->name('grading.index');
            Route::post('/create/grade', 'createGrade')->name('create.grade');
            Route::patch('update/grade', 'editGrade')->name('update.grade');

            Route::get('/allocation/class','viewClassAllocation')->name('index.class.allocation');


            Route::get('student-performance/{class_id}/{wing}', 'viewPerformance')->name('index.performance');
            Route::post('create/performance', 'createPerformance')->name('create.performance');
            Route::post('get-performance', 'viewEditPerformance')->name('get.performance');
            Route::patch('update/performance', 'editPerformance')->name('update.performance');


            Route::get('lesson-plan', 'lessonPlan')->name('lesson_plan.index');
            Route::get('lesson-plan/{class_id}/{subject_id}/{wing}', 'lessonPlan')->name('lesson_plan.open');
            Route::post('create/lesson-plan', 'createLessonPlan')->name('create.lesson_plan');
            Route::post('/edit-lesson-plan', 'showLessonPlan');
            Route::patch('update-lesson-plan', 'updateLessonPlan')->name('update.lesson_plan');

          });
        //   ***********   Routes for only admin & teachers access ends   ***********


    });


    // Route::get('/guardian/child-payments/{id}', [GuardianController::class,'findChildPayment'])
    // ->name('guardian.child.payment')
    // ->middleware(['verify.guardian']);

    Route::controller(GuardianController::class)->group(function(){
        Route::get('/guardian/payments', 'payments')->name('guardian.payments');
        Route::get('/guardian/children', 'children')->name('guardian.children');
        Route::get('/guardian/child-payments/{id}', 'findChildPayment')->name('guardian.child.payment')->middleware(['verify.guardian']);
        Route::get('/guardian/child-payments/{id}/{receipt_id}', 'findChildPayment')->name('guardian.reciept')->middleware(['verify.guardian']);
        Route::get('gurdian/result/{id}', 'result')->name('gurdian.result.index');
        Route::get('/result-slip', 'resultView')->name('result.slip');
        // Route::get('/guardian/child-payments/{id}', 'findChildPayment')->name('guardian.child.payment');

    });

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboards', 'dashboard' )->name('dashboard');
        Route::get('/profile', 'profile')->name('profile');
        Route::patch('upload/avatar', 'uploadAvatar')->name('upload.avatar');
        Route::post('/lga','getLga')->name('get.lga');
        Route::post('/class','getClassById')->name('get.class');
        Route::get('/calendar', [CaledarController::class,'calendar'])->name('calendar');
        Route::get('/transportion/routes', 'transportRoutes')->name('transportation.route');
        Route::post('get-students', 'getStudents')->name('get.students');
        // Time table matters :: still under review
        Route::get('/time-table/class', 'classTimeTable')->name('class.time.table');
        Route::get('/time-table', 'timeTable')->name('index.time.table');
        Route::post('add/schedule', 'createTimetable')->name('add.schedule');
        Route::post('class/time-table', 'timeTable')->name('view.class.time-table');
        Route::post('get/student','getStudent')->name('get.student');
        Route::post('get-grade', 'getGradeById')->name('get.grades');

        // ***********   Routes for only admin access    ***********
        Route::middleware('role:admin')->group(function () {
            // Applications
            Route::get('/applications', 'showApplications')->name('show.applications');

            // Complaints
            Route::get('/complaints', 'complaints')->name('complaints');
            Route::delete('/delete-complaint', 'deleteComplaint')->name('delete.complaint');
            Route::patch('/edit-complaint', 'updateComplaint')->name('update.complaint');

            // Cards/Id cards & settings
            Route::get('id-cards/{id}', 'showIdCard')->name('show.id.card');

            // SETTINGS ROUTES
            Route::get('/settings', 'settings')->name('settings');
            Route::post('create/school', 'createSchool')->name('create.school');
            Route::post('activate-achool', 'activatSchool')->name('activate.school');


            // Transportation and routes
            Route::post('/add-route', 'addRoutes')->name('add.transport.route');
            Route::get('/transportion/route/{id}', 'transportRoutes')->name('get.route');
            Route::patch('/edit-route', 'editRoutes')->name('edit.transport.route');
            Route::delete('/delete-route', 'deleteRoute')->name('delete.route');

            // Roles and permissions
            Route::get('/permissions', 'permissions' )->name('permissions');
            Route::get('/permissions/{id}', 'permissions')->name('find.permission');
            Route::get('revoke-permission', 'revokePermission')->name('revoke.index');
            Route::post('/permissions', 'createPermission' )->name('add.permission');
            Route::patch('update-permissions', 'updatePermission' )->name('update.permission');
            Route::delete('delete-permission', 'deletePermission')->name('delete.permission');
            Route::post('revoke-permissions', 'revokePermissions')->name('revoke.permission');

            Route::get('/roles', 'roles' )->name('roles');
            Route::get('roles/{id}', 'roles')->name('find.role');
            Route::post('/roles', 'createRole' )->name('add.role');
            Route::patch('update-role', 'updateRole')->name('update.role');
            Route::delete('delete-role', 'deleteRole')->name('delete.role');
            Route::get('/assign-permissions', 'assignPermissionView')->name('assign.permission.view');
            Route::post('/assign-permissions','assignPermission')->name('assign.permission');
            Route::post('/assign-role', 'assignRoleToUser')->name('assign.role');


            // Students
            Route::post('/create/student', 'createStudent')->name('create.student');
            Route::get('/student/{id}', 'getStudentInfo')->name('view.student');
            Route::post('/student-info', 'studentInformation')->name('get.student.info');
            Route::get('/student-info', 'studentInformation')->name('student.info');
            Route::get('/staff', 'staffList')->name('staff.list');
            // Route::get('/edit-student', 'updateStudent')->name('update.student');
            Route::get('/add-student', 'addStudent')->name('add.student');

            //Staffs
            // Route::get('/edit-staff', 'updateStaff')->name('update.staff');
            Route::get('/add-staff', 'addStaff')->name('add.staff');
            Route::post('/add-staff', 'createStaff')->name('create.staff');
            Route::post('/staff-updating', 'getStaffInfoForUpdate')->name('staff.id');
            Route::post('/add/staff/biodata', 'storeStaff')->name('add.staff.biodata');

            // Vehicles
            Route::get('/vehicles', 'vehicles')->name('vehicles');
            Route::post('/vehicle', 'createVehicle')->name('create.vehicle');
            Route::delete('vehicle/delete', 'deleteVehicle')->name('delete.vehicle');
            Route::get('vehicles/{id}', 'vehicles')->name('find.vehicle');
            Route::patch('vehicle/edit', 'editVehicle')->name('edit.vehicle');

            Route::get('assign-vehicle', 'vehicleAllocation')->name('vehicle.allocation');
            Route::get('assign-vehicle/{id}', 'vehicleAllocation')->name('edit.v-allocation');
            Route::post('allocate-vehicle', 'createBusAllocation')->name('create.v-allocation');
            Route::patch('edit-v-Allocation', 'editBusAllocation')->name('update.v-allocation');
            Route::delete('delete-v-Allocation', 'deleteBusAllocation')->name('delete.v-allocation');

            // Route::get('pay-transportation', 'payTransport')->name('pay.transport.index');
            // Route::post('pay-transportation/', 'payTransport')->name('pay.transport.find');
            // Route::post('create-student-transport', 'createStudentTransportation')->name('create.student.transport');

            // Subjects & subject allocations
            Route::get('/subject-allocation', 'subjectAllocation')->name('subject.allocations');
            Route::post('subject-allocation/add', 'addSubjectAllocation')->name('add.subject.allocation');
            Route::get('/subject-allocation/{id}', 'subjectAllocation')->name('find.subject.allocation');
            Route::patch('subject-allocation/edit', 'editSubjectAllocation')->name('edit.subject.allocation');
            Route::delete('subject-allocation/delete', 'deleteSubjectAllocation')->name('delete.subject.allocation');
            // Subjects
            Route::get('/subjects', 'subjects')->name('subjects');
            Route::get('/subject/{id}', 'subjects')->name('find.subject');
            Route::post('/add-subject', 'addSubject')->name('add.subject');
            Route::patch('/edit-subject', 'editSubject')->name('edit.subject');
            Route::delete('/delete-subject', 'deleteSubject')->name('delete.subject');

            // Classes and class allocations
            Route::get('/class-allocation', 'classAllocations')->name('class.allocations');
            Route::post('class-allocation/add', 'addClassAllocation')->name('add.class.allocation');
            Route::get('/class-allocation/{id}', 'classAllocations')->name('find.class.allocation');
            Route::patch('class-allocation/edit', 'editClassAllocation')->name('edit.class.allocation');
            Route::delete('class-allocation/delete', 'deleteClassAllocation')->name('delete.class.allocation');

        });
         // ***********   Routes for only admin access ends   ***********


          //  ***********   Routes for only admin & exam officers access    ***********
          Route::middleware('role:admin,eo')->group(function () {

            // lesson plans admin section
            Route::get('admin/lesson-plans', 'lessonPlans')->name('admin.lesson_plans');
            Route::get('admin/lesson-plan/{id}', 'viewLessonPlan')->name('view.lesson_plan');
            Route::patch('admin/update-lesson-plan', 'updateLessonPlan')->name('admin.update.lesson_plan');

            // Promotins and demotions
            Route::get('/promotions', 'promotion')->name('promotions');
            Route::get('/promotion/{class_id}', 'promotionView')->name('view.promotion');
            Route::patch('promote-student', 'promoteStudent')->name('promote.student');
            Route::get('/demotion/{class_id}', 'demotionView')->name('view.demotion');
            Route::patch('demote-student', 'demoteStudent')->name('demote.student');


            // Admission matters
            Route::get('/admissions', 'admission')->name('admission');
            Route::get('/admissions/{id}', 'admission')->name('find.admission');
            Route::post('/admissions/add', 'beginAdmission')->name('admission.begin');
            Route::patch('/admissions/edit', 'closeAdmission')->name('admission.close');
            Route::patch('/toggle-admission', 'toggleAdmission')->name('toggle.admission');

            // Results and results matters
            Route::get('/release-result', 'releaseResult')->name('release.result');
            Route::patch('/release-result', 'toggleResult')->name('toggle.result');
            Route::post('/result/add', 'addResult')->name('add.result');
            Route::delete('/delete/result', 'deleteResult')->name('delete.result');
            Route::post('/send/test-mail', 'sendTestEmail')->name('send.test.mail');

            // OLD Student Results cases and views
            Route::get('/show-result', 'showResult')->name('index.result');
            Route::post('/search-result', 'findResult')->name('find.result');
            Route::get('/result', 'resultView')->name('view.result');
            // Student results
            Route::get('/student-result', 'studentResult')->name('student.result');
            Route::get('/student-results', 'studentResult')->name('student.result.student');
            // {student_id}/{wing}
            Route::get('/results-classes', [ExamOfficerController::Class, 'uploadedGrades'])->name('uploaded.results.class');
            Route::post('eo/get-grade', [ExamOfficerController::Class, 'viewGrade'])->name('eo.get.grade');

          });
          //   ***********   Routes for only admin & exam officers access ends    ***********


          //   ***********   Routes for only admin & accountants access    ***********
          Route::middleware('role:admin,accountant')->group(function () {

            Route::get('pay-transportation', 'payTransport')->name('pay.transport.index');
            Route::post('pay-transportation/', 'payTransport')->name('pay.transport.find');
            Route::post('create-student-transport', 'createStudentTransportation')->name('create.student.transport');

            // Payments and verifications
            Route::get('/edit-payment', 'updatePayment')->name('update.payment');
            Route::get('/pay-fees', 'makePayment')->name('make.payment');
            Route::post('/pay-fees', 'makePayment')->name('info.make.payment');
            Route::post('create-payment', 'createPayment')->name('create.payment');
            Route::post('payment/details', 'getPaymentInfo');
            Route::get('/fees', 'feeStructure')->name('fees');
            Route::get('/payments', 'payments')->name('payments');
            Route::post('/payments', 'payments')->name('get.payments');

            Route::post('/pay', 'redirectToGateway')->name('pay');
            Route::get('/payment/callback', 'handleGatewayCallback');

          });
            // ***********   Routes for only admin & accountants access ends    ***********


            //   ***********   Routes for only admin & accountants access    ***********
          Route::middleware('role:admin,accountant,eo')->group(function () {
            // Students info
            Route::get('/students', 'studentList')->name('student.list');
            Route::post('/students', 'studentList')->name('student.filter');
          });
          //   ***********   Routes for only admin & accountants access ends    ***********



        //   Testings
            Route::post('download/students', 'testt')->name('test.download');
            Route::post('/send/holiday-notification', 'sendHolidayNotification')->name('send.holiday-notification');


        // });
    });

});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\attendenceReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\classController;

use App\Http\Controllers\groupController;
use App\Http\Controllers\yearController;
use App\Http\Controllers\examController;
use App\Http\Controllers\shiftController;
use App\Http\Controllers\feecataController;

use App\Http\Controllers\subjectController;
use App\Http\Controllers\feeAmountController;
use App\Http\Controllers\desigController;
use App\Http\Controllers\employeeRegController;
use App\Http\Controllers\studentRegController;

use App\Http\Controllers\promotionController;

use App\Http\Controllers\pdfController;
use App\Http\Controllers\salaryIncrementController;

use App\Http\Controllers\employeeLeveController;

use App\Http\Controllers\employeeAttendenceController;

use App\Http\Controllers\MarksController;

use App\Http\Controllers\GradeController;
use App\Http\Controllers\StudentFeeController;

use App\Http\Controllers\employeeSalaryController;
use App\Http\Controllers\markesheetController;
use App\Http\Controllers\othercostController;
use App\Http\Controllers\profitController;
use App\Http\Controllers\ResultReportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('backend.dashboard');
})->name('dashboard');


Route::get('/user', function () {
    return view('backend/dashboard');
});

Route::get('/user/logout', [userController::class, 'userLogout'])->name('user.logout');


Route::get('/user/profile', [userController::class, 'gerUserData'])->name('user.profile');


Route::get('/user/edit', [userController::class, 'editUserData'])->name('user.edit');


Route::post('/user/update', [userController::class, 'updateUserData'])->name('user.update');

Route::get('/user/edit/password', [userController::class, 'edtiUserPass'])->name('user.edit.password');

Route::post('/user/update/password', [userController::class, 'updateUserPass'])->name('user.update.password');


Route::get('/user/list', [userController::class, 'GetUserList'])->name('user.list');

Route::post('/role/update/', [userController::class, 'updateUserRole'])->name('role.update');

Route::get('/user/add/', [userController::class, 'addUserForm'])->name('add.user');


Route::post('/user/add/', [userController::class, 'addUser'])->name('add.user');
Route::get('/user/delete/{id}', [userController::class, 'deleteUser'])->name('delete.user');


//Class route

Route::prefix('class')->group(function(){
    Route::get('all', [classController::class, 'viewClass'])->name('view.class');
    Route::post('store', [classController::class, 'storeClass'])->name('store.class');
    Route::get('edit/{id}', [classController::class, 'editClass'])->name('edit.class');
    Route::post('update', [classController::class, 'updateClass'])->name('update.class');
    Route::get('delete/{id}', [classController::class, 'deleteClass'])->name('delete.class');
});

//Group Route
Route::prefix('group')->group(function(){
    Route::get('all', [groupController::class, 'viewGroup'])->name('view.group');
    Route::post('store', [groupController::class, 'storeGroup'])->name('store.group');
    Route::get('edit/{id}', [groupController::class, 'editGroup'])->name('edit.group');
    Route::post('update', [groupController::class, 'updateGroup'])->name('update.group');
    Route::get('delete/{id}', [groupController::class, 'deleteGroup'])->name('delete.group');
});

//Year Route
Route::prefix('year')->group(function(){
    Route::get('all', [yearController::class, 'viewYear'])->name('view.year');
    Route::post('store', [yearController::class, 'storeYear'])->name('store.year');
    Route::get('edit/{id}', [yearController::class, 'editYear'])->name('edit.year');
    Route::post('update', [yearController::class, 'updateYear'])->name('update.year');
    Route::get('delete/{id}', [yearController::class, 'deleteYear'])->name('delete.year');
});

//Exam Route

Route::resource('exam', examController::class);

//Shift Route

Route::resource('shift', shiftController::class);

//Fee category Route

Route::resource('feecata', feecataController::class);


//Fee Amount
Route::resource('feeamount', feeAmountController::class);

//Subject Route
Route::resource('subject', subjectController::class);

//Designation
Route::resource('designation', desigController::class);

//Student Registration
Route::resource('student', studentRegController::class);
//Student Promotion

Route::get('promotion/{id}', [promotionController::class, 'EditPromotion'] )->name('student.promotion');

Route::post('promote/{student_id}', [promotionController::class, 'PromoteStudent'] )->name('student.promote');
//Pdf generate route
Route::get('student_details/{stu_id}', [pdfController::class, 'studentDetailsPdf'])->name('student.details.pdf');


//Employee Management Routes

Route::prefix('employee')->group(function(){
    Route::get('view', [employeeRegController::class, 'employeeView'])->name('view.employee');
    Route::get('add', [employeeRegController::class, 'employeeAdd'])->name('add.employee');
    Route::post('store', [employeeRegController::class, 'employeeStore'])->name('store.employee');

    Route::get('edit/{id}', [employeeRegController::class, 'employeeEdit'])->name('edit.employee');

    Route::post('update/{id}', [employeeRegController::class, 'employeeUpdate'])->name('update.employee');
    Route::get('employee_details/{id}', [employeeRegController::class, 'EmployeeDetailsPdf'])->name('employee.details.pdf');

    //Salary Routes

    Route::get('salary', [salaryIncrementController::class, 'salaryView'])->name('employee.salary.view');

    Route::get('salary/increment/{id}', [salaryIncrementController::class, 'salaryIncrement'])->name('employee.salary.increment');

    Route::post('salary/update/{id}', [salaryIncrementController::class, 'salaryIncrementStore'])->name('update.salary');

    Route::get('salary/details/{id}', [salaryIncrementController::class, 'salaryIncrementHistory'])->name('salary.details');

    //Leave Routes

    Route::get('leave', [employeeLeveController::class, 'EmployeeleaveView'])->name('employee.leave.view');

    Route::get('leave/add', [employeeLeveController::class, 'EmployeeleaveAdd'])->name('employee.leave.add');

    Route::post('leave/store', [employeeLeveController::class, 'EmployeeleaveStore'])->name('employee.leave.store');

    Route::get('leave/edit/{id}', [employeeLeveController::class, 'EmployeeleaveEdit'])->name('employee.leave.edit');

    Route::get('leave/edit/{id}', [employeeLeveController::class, 'EmployeeleaveEdit'])->name('employee.leave.edit');


    Route::post('leave/update/{id}', [employeeLeveController::class, 'EmployeeleaveUpdate'])->name('employee.leave.update');

    Route::get('leave/delete/{id}', [employeeLeveController::class, 'EmployeeleaveDelete'])->name('employee.leave.delete');

    //Employee attendence

    Route::get('attendence', [employeeAttendenceController::class, 'EmployeeAttendenceView'])->name('employee.attendence.view');

    Route::get('attendence/add', [employeeAttendenceController::class, 'EmployeeAttendenceAdd'])->name('employee.attendence.add');

    Route::get('attendence/details/{date}', [employeeAttendenceController::class, 'EmployeeAttendenceDetails'])->name('employee.attendence.details');

    Route::post('attendence/store', [employeeAttendenceController::class, 'EmployeeAttendenceStore'])->name('employee.attendence.store');

    Route::get('attendence/edit/{date}', [employeeAttendenceController::class, 'EmployeeAttendenceEdit'])->name('employee.attendence.edit');

    Route::post('attendence/update/{date}', [employeeAttendenceController::class, 'EmployeeAttendenceUpdate'])->name('employee.attendence.update');




});


//Marks Related Routes

Route::prefix('marks')->group(function(){
    route::get('entry', [MarksController::class, 'MarksEntryView'])->name('marks.entry');
});

//Marks related Jquery

Route::prefix('mark')->group(function(){
    Route::get('/search', [MarksController::class, 'MarksSearch'] );
    Route::post('/store', [MarksController::class, 'MarksStore'] )->name('marks.store');
    Route::get('/edit', [MarksController::class, 'MarksEdit'] )->name('marks.edit');

    Route::get('/edit/search', [MarksController::class, 'MarksSearchForEdit'] )->name('marks.edit.search');

    Route::post('/update', [MarksController::class, 'MarksUpdateStore'])->name('marks.update');


});

    //Greade system Route

    Route::prefix('grade')->group(function(){
        route::get('/view', [GradeController::class, 'GradeView'])->name('grade.view');
        route::get('/add', [GradeController::class, 'GradeAdd'])->name('grade.add');
        route::post('/store', [GradeController::class, 'GradeStore'])->name('grade.store');

        route::get('/edit/{id}', [GradeController::class, 'GradeEdit'])->name('grade.edit');

        route::post('/update/{id}', [GradeController::class, 'GradeUpdate'])->name('grade.update');

        route::get('/delete/{id}', [GradeController::class, 'GradeDelete'])->name('grade.delete');

    });


    //Account Management route for fee

Route::prefix('stufees')->group(function(){
    route::get('view', [StudentFeeController::class, 'FeesView'])->name('student.fees.view');
    route::get('add', [StudentFeeController::class, 'FeesAdd'])->name('student.fees.add');

    route::post('store', [StudentFeeController::class, 'FeesStore'])->name('student.fees.store');

    route::get('edit', [StudentFeeController::class, 'FeesEdit'])->name('student.fees.edit');
    route::post('update', [StudentFeeController::class, 'FeesUpdate'])->name('student.fees.update');

    //Fee search Ajax
    route::get('/search', [StudentFeeController::class, 'FeesSearch']);

    route::get('edit/search', [StudentFeeController::class, 'FeesEditSearch']);
});

//Account Manager Employee Payment

Route::prefix('employees')->group(function(){
    route::get('payment/view', [employeeSalaryController::class, 'PayemtView'])->name('employees.payment.view');

    route::get('payment/add', [employeeSalaryController::class, 'PayemtAdd'])->name('employees.payment.add');


    route::post('payment/store', [employeeSalaryController::class, 'PaymentSotre'])->name('employees.payment.store');


    //ajax for search employee

    route::get('payment/search', [employeeSalaryController::class, 'PaymentSearch']);

    route::get('payment/designation/{id}', [employeeSalaryController::class, 'PaymentDesignationSearch']);

});

Route::prefix('othercost')->group(function(){
    route::get('view', [othercostController::class, 'otherCostView' ])-> name('othercost.view');
    route::post('store', [othercostController::class, 'otherCostStore' ])-> name('othercost.store');
    route::get('edit/{id}', [othercostController::class, 'otherCostEdit' ])-> name('othercost.edit');
    route::post('update/{id}', [othercostController::class, 'otherCostUpdate' ])-> name('othercost.update');
});

Route::prefix('profit')->group(function(){
    route::get('view', [profitController::class, 'profitView'] )->name('profit.view');



    //Ajax for profit search
    route::get('datewise/search', [profitController::class, 'profitDatewiseSearch'] );


    //Pdf generate

    route::get('details/pdf/{startDate}/{endDate}', [pdfController::class, 'ProfitDetailsPdf'] );



});


//Marksheet Generate

Route::prefix('marksheet')->group(function(){
    route::get('view',[markesheetController::class, 'MarksheetView'])->name('marksheet.view');
    route::post('search',[markesheetController::class, 'MarksheetSearch'])->name('marksheet.search');
});

Route::prefix('attendence/report')->group(function(){
    route::get('employee', [attendenceReportController::class, 'employeeAttendence'])->name('attendence.report.employee');

    //PDF Report
    route::post('employee/search', [attendenceReportController::class, 'employeeAttendenceSearch'])->name('attendence.report.employee.search');
});

Route::prefix('exam/report')->group(function(){
    route::get('view', [ResultReportController::class, 'ResullReportView'])->name('exam.report.view');

    route::post('pdf', [ResultReportController::class, 'ResultReportPdf'])->name('exam.report.pdf');
});

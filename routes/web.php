<?php

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
    return view('backend\dashboard');
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

//Subject Controller
Route::resource('subject', subjectController::class);


Route::resource('designation', desigController::class);


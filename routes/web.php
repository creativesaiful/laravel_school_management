<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
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

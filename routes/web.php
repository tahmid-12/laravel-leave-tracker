<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/submitLeave',[LeaveController::class,'submitLeave']);

Route::get('/admin/leaves', [AdminController::class, 'index'])->name('admin.leaves');
Route::post('/admin/leave/approve/{id}', [AdminController::class, 'approveLeave'])->name('admin.leave.approve');
Route::post('/admin/leave/reject/{id}', [AdminController::class, 'rejectLeave'])->name('admin.leave.reject');
Route::get('/home', [LeaveController::class, 'index']);


Route::post('/leave/approve/{id}', [LeaveController::class, 'approveLeave'])->name('leave.approve');
Route::post('/leave/reject/{id}', [LeaveController::class, 'rejectLeave'])->name('leave.reject');

Route::get('/admin', [AdminController::class, 'adminPage']);

Route::post('/admin/leaves', [AdminController::class, 'adminLogIn']);


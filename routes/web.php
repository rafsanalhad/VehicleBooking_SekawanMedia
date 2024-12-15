<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController; 
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\VehicleController;

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
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signUpView'])->name('signUpView');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signUp');
Route::get('/getUser', [UserController::class, 'getUserModal'])->name('getUser');
Route::get('/getApprover', [ApprovalController::class, 'getApproverModal'])->name('getApprover');
Route::get('/getVehicles', [VehicleController::class, 'getVehicles'])->name('getVehicles');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('adminDashboard');
Route::post('admin/createBooking', [BookingController::class, 'createBooking'])->name('createBooking');
Route::get('admin/users', [UserController::class, 'index'])->name('adminUsers');
Route::get('admin/list-bookings', [BookingController::class, 'getListBooking'])->name('adminListBooking');
Route::get('admin/list-approvals', [ApprovalController::class, 'getAllApproval'])->name('adminApproval');

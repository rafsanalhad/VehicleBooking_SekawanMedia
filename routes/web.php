<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController; 
use App\Http\Controllers\ApprovalController;

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
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('admin/booking', [AdminController::class, 'booking'])->name('booking');
Route::get('admin/list-bookings', [BookingController::class, 'getListBooking'])->name('adminBooking');
Route::get('admin/list-approvals', [ApprovalController::class, 'getAllApproval'])->name('adminApproval');

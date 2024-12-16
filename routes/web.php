<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController; 
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', [AuthController::class, 'loginView'])->name('loginView');

Route::get('/login', [AuthController::class, 'loginView'])->name('loginView');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/signup', [AuthController::class, 'signUpView'])->name('signUpView');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signUp');
Route::get('/getUser', [UserController::class, 'getUserModal'])->name('getUser');
Route::get('/getApprover', [ApprovalController::class, 'getApproverModal'])->name('getApprover');
Route::get('/getApproverAdmin', [AdminController::class, 'getApproverModal'])->name('getApprovalAdmin');
Route::get('/getVehicles', [VehicleController::class, 'getVehicles'])->name('getVehicles');
Route::get('/getAllDepartment', [UserController::class, 'getAllDepartment'])->name('getAllDepartment');
Route::get('/getUserById/{id}', [UserController::class, 'getUserById'])->name('getUserById');
Route::get('admin/dashboard', [AdminController::class, 'index'])->name('adminDashboard');
Route::post('admin/createBooking', [BookingController::class, 'createBooking'])->name('createBooking');
Route::get('admin/users', [UserController::class, 'index'])->name('adminUsers');
Route::get('admin/list-bookings', [AdminController::class, 'getListBooking'])->name('adminListBooking');
Route::get('admin/list-approvals', [AdminController::class, 'getAllApproval'])->name('adminApproval');
Route::post('admin/addUser', [UserController::class, 'addUser'])->name('addUser');
Route::post('admin/editUser', [UserController::class, 'editUser'])->name('editUser');
Route::post('admin/deleteUser', [UserController::class, 'deleteUserById'])->name('deleteUser');
Route::get('admin/vehicles', [VehicleController::class, 'index'])->name('adminVehicles');
Route::post('admin/getVehicleById', [VehicleController::class, 'getVehicleById'])->name('getVehicleById');
Route::post('admin/addVehicle', [VehicleController::class, 'addVehicle'])->name('addVehicle');
Route::post('admin/editVehicle', [VehicleController::class, 'editVehicle'])->name('editVehicle');
Route::post('admin/deleteVehicle', [VehicleController::class, 'deleteVehiclesById'])->name('deleteVehicle');
Route::get('admin/departments', [DepartmentController::class, 'index'])->name('adminDepartments');
Route::post('admin/getDepartmentById', [DepartmentController::class, 'getDepartmentById'])->name('getDepartmentById');
Route::post('admin/addDepartment', [DepartmentController::class, 'addDepartment'])->name('addDepartment');
Route::post('admin/editDepartment', [DepartmentController::class, 'editDepartment'])->name('editDepartment');
Route::post('admin/deleteDepartment', [DepartmentController::class, 'deleteDepartmentById'])->name('deleteDepartment');
Route::get('approval/dashboard', [ApprovalController::class, 'index'])->name('approvalDashboard');
Route::get('approval/list-approval', [ApprovalController::class, 'approval'])->name('approval');
Route::post('approval/update-approval/', [ApprovalController::class, 'updateApproval'])->name('updateApproval');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect'])->middleware(['auth','verified']); //for email send

//Users
Route::post('/appointment', [HomeController::class, 'appointment'])->middleware('auth');
Route::get('/myappointment', [HomeController::class, 'myappointment'])->middleware('auth');
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment'])->middleware('auth');

//Admin

//Users
Route::get('/user_view', [AdminController::class, 'userview'])->middleware('auth');
Route::post('/upload_user', [AdminController::class, 'storeUser'])->middleware('auth');
Route::get('/updateUserView/{id}', [AdminController::class, 'updateUserView'])->middleware('auth');
Route::post('/updateUser/{id}', [AdminController::class, 'updateUser'])->middleware('auth');
Route::get('/deleteUser/{id}', [AdminController::class, 'deleteUser'])->middleware('auth');
Route::get('/updateAdminView/{id}', [AdminController::class, 'updateAdminView'])->middleware('auth');
Route::post('/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->middleware('auth');

//Doctor
Route::get('/add_doctor_view', [AdminController::class, 'addview'])->middleware('auth');
Route::post('/upload_doctor', [AdminController::class, 'storeDoctor'])->middleware('auth');
Route::get('/deleteDoc/{id}', [AdminController::class, 'deleteDoc'])->middleware('auth');
Route::get('/updateDoc/{id}', [AdminController::class, 'updateDoc'])->middleware('auth');
Route::post('/updateDoctor/{id}', [AdminController::class, 'updateDoctor'])->middleware('auth');
Route::get('/search_doctor', [AdminController::class, 'searchDoctor'])->middleware('auth');

//Apointments
Route::get('/showAppointments', [AdminController::class, 'showAppointments'])->middleware('auth');
Route::get('/approveAppoint/{id}', [AdminController::class, 'approveAppoint'])->middleware('auth');
Route::get('/cancelAppoint/{id}', [AdminController::class, 'cancelAppoint'])->middleware('auth');
Route::get('/emailView/{id}', [AdminController::class, 'emailView'])->middleware('auth');
Route::post('/sendMail/{id}', [AdminController::class, 'sendMail'])->middleware('auth');
Route::get('/search_appointment', [AdminController::class, 'searchAppointment'])->middleware('auth');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

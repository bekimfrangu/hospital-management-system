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

Route::get('/home', [HomeController::class, 'redirect']);

//Users
Route::get('/user_view', [AdminController::class, 'userview'])->middleware('auth');
Route::post('/upload_user', [AdminController::class, 'storeUser'])->middleware('auth');
Route::post('/appointment', [HomeController::class, 'appointment'])->middleware('auth');
Route::get('/myappointment', [HomeController::class, 'myappointment'])->middleware('auth');
Route::get('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment'])->middleware('auth');

//Admin
Route::get('/add_doctor_view', [AdminController::class, 'addview'])->middleware('auth');
Route::post('/upload_doctor', [AdminController::class, 'storeDoctor'])->middleware('auth');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

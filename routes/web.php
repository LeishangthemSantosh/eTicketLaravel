<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForgotPasswordController;


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
    return view('homapage.homepage');
});


Route::get('/login', [AuthController::class, 'login'])->name('login.route');
Route::post('/check-login', [AuthController::class, 'checklogin']);
Route::get('/user-profile', [AuthController::class, 'profile'])->middleware('isLogged');;
Route::get('logout', [AuthController::class, 'logout']);
Route::get('/register', [AuthController::class, 'registration']);
Route::post('/store-registration', [AuthController::class, 'storeRegister']);
//forgot User Password
Route::get('/forgot-password', [ForgotPasswordController::class, 'forgotPassword']);
Route::post('/submit-forgot-password', [ForgotPasswordController::class, 'submitForgotPassword']);
Route::get('/reset-password/{id}', [ForgotPasswordController::class, 'resetPassword'])->name('reset.password.get');;
Route::post('/submit-reset-password', [ForgotPasswordController::class, 'submitResetPassword']);


//Event
Route::get('/add-event', [EventController::class, 'addEvent']);
Route::post('/store-event', [EventController::class, 'storeEvent']);

// Admin Pages
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.main');
    });
    Route::get('/view-events', [AdminController::class, 'viewEvent']);
    Route::post('/viewupdate-request-status/{requestid}/{event_status}', [AdminController::class, 'statusApproveReject']);
});

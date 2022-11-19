<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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



Route::get('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'registration']);
Route::post('/store-registration',[AuthController::class,'storeRegister']);


// Admin Pages
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.main');
    });
});

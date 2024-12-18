<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[AuthController::class,'index'])->name('login');;
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=>'admin'],function()
{
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/teacher', function () {
        return view('teacher');
    })->name('teacher');
    
});
Route::group(['middleware'=>'teacher'],function()
{

    Route::get('/teacher', function () {
        return view('teacher');
    })->name('teacher');
    
});
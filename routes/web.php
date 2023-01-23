<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResumeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisterController::class, 'create'])->name('register');
    Route::post('register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    Route::post('/logout', [LoginController::class, 'destroy']);
    Route::get('/resumes', [ResumeController::class, 'index']);
    Route::get('/resume/create', [ResumeController::class, 'create']);
    Route::get('/resume/{resume:slug}', [ResumeController::class, 'show']);
    Route::post('/resume', [ResumeController::class, 'store']);
    Route::get('/resume/{resume}/edit', [ResumeController::class, 'edit']);
    Route::patch('/resume/{resume}', [ResumeController::class, 'update']);
    Route::delete('/resume/{resume}', [ResumeController::class, 'destroy']);
});

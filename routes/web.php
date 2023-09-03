<?php

use App\Http\Controllers\ReporterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [ReporterController::class, 'reports']);
Route::get('/report', [ReporterController::class, 'index']);
Route::post('/report', [ReporterController::class, 'submit'])->name('report');

Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('auth.login');
    })->name('login');
    Route::post('login', [UserController::class, 'login'])->name('login.submit');
    Route::get('register', function () {
        return view('auth.register');
    })->name('register');
    Route::post('register', [UserController::class, 'register'])->name('register.submit');
});
Route::middleware('auth')->group(function () {
    Route::get('downloads/{id}', [UserController::class, 'viewMedia'])->name('download');
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('dashboard', [UserController::class, 'edit'])->name('report.submit');
    Route::get('history', [UserController::class, 'reports'])->name('reports.tracker');
    Route::get('activity', [UserController::class, 'activity'])->name('activity');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});

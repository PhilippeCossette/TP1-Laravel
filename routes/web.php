<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SetLocaleController;


Route::middleware(['web'])->group(function () {

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');

Route::get('/register', [AuthController::class, 'create'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::get('/lang/{locale}', [SetLocaleController::class, 'index'])->name('lang');

});
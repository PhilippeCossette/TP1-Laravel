<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/students/list', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
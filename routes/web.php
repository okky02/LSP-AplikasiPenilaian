<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Route root menggunakan metode create dari StudentController
Route::get('/', [StudentController::class, 'create'])->name('home');

// Route untuk menampilkan form input data mahasiswa
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// Route untuk menyimpan data mahasiswa
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
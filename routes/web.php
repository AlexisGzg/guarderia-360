<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FamilyController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/indexService', function () {
    return view('services');
});

Route::get('/indexProgram', function () {
    return view('program');
});

Route::get('/preRegister', function () {
    return view('preregister');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/employee', EmployeeController::class);
    Route::resource('admin/family', FamilyController::class);
    Route::resource('admin/service', ServiceController::class);
    Route::resource('admin/post', PostController::class);
});


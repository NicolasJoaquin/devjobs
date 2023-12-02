<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\NotificationController;

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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [JobController::class, 'index'])->middleware(['auth', 'verified', 'user.role'])->name('jobs.index');
Route::get('/jobs/create', [JobController::class, 'create'])->middleware(['auth', 'verified'])->name('jobs.create');
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'verified'])->name('jobs.edit');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/applicants/{job}', [ApplicantController::class, 'index'])->name('applicants.index');
// Notificaciones
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'user.role'])->name('notifications');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

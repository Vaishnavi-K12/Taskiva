<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;

use App\Http\Controllers\ProfileController;
// Home
Route::get('/', function () {
    return redirect()->route('login');
});


// Authentication Routes

Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// Protected Routes

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [TaskController::class, 'index'])
        ->name('dashboard');

    Route::post('/tasks', [TaskController::class, 'store'])
        ->name('tasks.store');

    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])
        ->name('tasks.status');

    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])
        ->name('tasks.destroy');

    Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile');

    Route::put('/profile', [ProfileController::class, 'update'])
    ->name('profile.update');

    Route::put('/profile/password', [ProfileController::class, 'changePassword'])
    ->name('profile.password');

});
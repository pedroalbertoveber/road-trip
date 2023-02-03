<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TripsController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/* PUBLIC ROUTES */
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/login', [AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('/register', [AuthController::class, 'signUp'])->name('auth.signUp');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

/* PRIVATE ROUTES */
Route::middleware('authenticator')->group(function () {
    Route::get('/', [TripsController::class, 'index'])->name('trips.index');
    Route::get('/create', [TripsController::class, 'create'])->name('trips.create');
    Route::get('/edit/{id}', [TripsController::class, 'edit'])->name('trips.edit');
    Route::put('/update', [TripsController::class, 'update'])->name('trips.update');
    Route::post('/store', [TripsController::class, 'store'])->name('trips.store');
    Route::delete('/delete/{id}', [TripsController::class, 'destroy'])->name('trips.destroy');
});
<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/login', [AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('/register', [AuthController::class, 'signUp'])->name('auth.signUp');

Route::middleware('authenticator')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});
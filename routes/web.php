<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\TripsController;
use App\Http\Middleware\VerifyUser;
use Illuminate\Support\Facades\Route;

/* PUBLIC ROUTES */
Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::get('/register', [AuthController::class, 'register'])->name('auth.register');

Route::post('/login', [AuthController::class, 'signIn'])->name('auth.signIn');
Route::post('/register', [AuthController::class, 'signUp'])->name('auth.signUp');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

/* PRIVATE ROUTES */
Route::middleware('authenticator')->group(function () {

    /* TRIP'S ROUTES */
    Route::get('/', [TripsController::class, 'index'])->name('trips.index');
    Route::get('/create', [TripsController::class, 'create'])->name('trips.create');

    Route::get('/edit/{trip_id}', [TripsController::class, 'edit'])
        ->name('trips.edit')
        ->middleware(VerifyUser::class);

    Route::get('/{trip_id}', [TripsController::class, 'show'])
        ->name('trips.show')
        ->middleware(VerifyUser::class);

    Route::put('/update', [TripsController::class, 'update'])
        ->name('trips.update');

    Route::post('/store', [TripsController::class, 'store'])
        ->name('trips.store');

    Route::delete('/delete/{trip_id}', [TripsController::class, 'destroy'])
        ->name('trips.destroy');

    /* CAR'S ROUTES */
    Route::get('/{trip_id}/cars/create', [CarsController::class, 'create'])
        ->name('cars.create')
        ->middleware(VerifyUser::class);

    Route::get('/{trip_id}/cars/edit', [CarsController::class, 'edit'])
        ->name('cars.edit')
        ->middleware(VerifyUser::class);

    Route::post('/{trip_id}/cars/store', [CarsController::class, 'store'])
        ->name('cars.store');

    Route::put('/{trip_id}/cars/update', [CarsController::class, 'update'])
        ->name('cars.update');
});
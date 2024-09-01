<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

Route::get('/', function () {
    return redirect()->route('cars.list');
});

Route::get('/cars', [CarController::class, 'list'])->name('cars.list');
Route::get('/cars/list', function () {
    return redirect()->route('cars.list');
});

Route::get('/cars/show/{id}', [CarController::class, 'show'])->name('cars.show');

Route::get('/cars/create', [CarController::class, 'create'])->name('cars.create');
Route::post('/cars', [CarController::class, 'store'])->name('cars.store');

Route::get('/cars/random', [CarController::class, 'random'])->name('cars.random');

Route::delete('/cars/delete/{id}', [CarController::class, 'delete'])->name('cars.delete');
Route::get('/cars/deleteAll', [CarController::class, 'deleteAllCars'])->name('cars.deleteAll');

<?php

use App\Http\Controllers\CovidDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CovidDataController::class, 'worldMap'])->name('covid-data.world-map');
Route::get('/covid-data', [CovidDataController::class, 'index'])->name('covid-data.index');
Route::get('/covid-data/{country}', [CovidDataController::class, 'show'])->name('covid-data.show');

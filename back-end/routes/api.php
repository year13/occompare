<?php

use App\Http\Controllers\OccupationsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['api'])->group(function () {
    Route::get('/occupations', [OccupationsController::class, 'index']);
    Route::post('/compare',  [OccupationsController::class, 'compare']);
});

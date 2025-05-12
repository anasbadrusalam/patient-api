<?php

use App\Http\Controllers\PatientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('access.key')->group(function () {
    Route::apiResource('patients', PatientController::class);
});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TravelRequestController;

Route::post('login', [AuthController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::resource('users', UserController::class);
    Route::get('me', [AuthController::class, 'me']);
    Route::get('travel-requests', [TravelRequestController::class, 'index']);
    Route::post('travel-request', [TravelRequestController::class, 'store']);
    Route::get('travel-request/{id}', [TravelRequestController::class, 'show']);
    Route::put('travel-request/{id}', [TravelRequestController::class, 'update']);
    Route::delete('travel-request/{id}', [TravelRequestController::class, 'destroy']);
    Route::post('travel-request/{id}/status', [TravelRequestController::class, 'setStatusTravelRequest']);

    Route::post('logout', [AuthController::class, 'logout']);
});

<?php

use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\GymController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/chat', [ChatbotController::class, 'chat']);
Route::get('/gyms/nearby', [GymController::class, 'findNearestGyms']);

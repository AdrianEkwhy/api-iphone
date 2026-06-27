<?php
use Illuminate\Http\Request;
use App\Http\Controllers\IphoneController;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::get('/iphones', [IphoneController::class, 'index']);
Route::get('/iphones/{id}', [IphoneController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/iphones', [IphoneController::class, 'store']);
    Route::put('/iphones/{id}', [IphoneController::class, 'update']);
    Route::delete('/iphones/{id}', [IphoneController::class, 'destroy']);
});
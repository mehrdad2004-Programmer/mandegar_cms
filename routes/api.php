<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix("registration")->group(function(){
    Route::post('/register', [RegistrationController::class, 'register']);
    Route::post('/getData', [RegistrationController::class, 'getStudentData']);
    Route::post('/setStatus', [RegistrationController::class, 'setStatus']);
});

Route::get('test', [RegistrationController::class, 'UniqueCode']);
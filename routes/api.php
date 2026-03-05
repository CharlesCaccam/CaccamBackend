<?php

<<<<<<< HEAD
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
=======
use App\Http\Controllers\Api\AuthController;

Route::get('/token-test', function() {
    // This finds a user OR creates a temporary one so it doesn't crash
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->create();
    
    return $user->createToken('test')->plainTextToken;
});
>>>>>>> 379f6ef (TOKEN TEST :))))

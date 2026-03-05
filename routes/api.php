<?php

use App\Http\Controllers\Api\AuthController;

Route::get('/token-test', function() {
    // This finds a user OR creates a temporary one so it doesn't crash
    $user = \App\Models\User::first() ?? \App\Models\User::factory()->create();
    
    return $user->createToken('test')->plainTextToken;
});

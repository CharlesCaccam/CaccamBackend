<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
   
   public function login(Request $request)
{
    // 1. Use -> for validate and () for the array
    $fields = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    // 2. Use () for attempt
    if (!Auth::attempt($fields)) {
        return response()->json([
            'message' => 'Invalid Credentials Po'
        ], 401);
    }

    // 3. Use () for user and createToken
    $user = Auth::user();
    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token
    ], 200);
}

}
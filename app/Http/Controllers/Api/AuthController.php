<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
   
   public function login(Request $request)
{
<<<<<<< HEAD
    // 1. Use -> for validate and () for the array
    $fields = $request->validate([
=======
    
    $request->validate([
>>>>>>> 379f6ef (TOKEN TEST :))))
        'email' => 'required|email',
        'password' => 'required'
    ]);

<<<<<<< HEAD
    // 2. Use () for attempt
    if (!Auth::attempt($fields)) {
=======
   
    if (!Auth::attempt($request->only('email','password'))) {
>>>>>>> 379f6ef (TOKEN TEST :))))
        return response()->json([
            'message' => 'Invalid Credentials Po'
        ], 401);
    }

<<<<<<< HEAD
    // 3. Use () for user and createToken
    $user = Auth::user();
    $token = $user->createToken('authToken')->plainTextToken;
=======
    
    $user = Auth::user();

    $token = $user->createToken('react-app')->plainTextToken;
>>>>>>> 379f6ef (TOKEN TEST :))))

    return response()->json([
        'user' => $user,
        'token' => $token
    ], 200);
}

}
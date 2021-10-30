<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($request->only('email','password'))) {
            return response()->json(['error' => 'Email or password error'], 401);
        }

        return response()->json([
            'user' => auth()->user(),
            'token' => auth()->user()->createToken('API Token')->plainTextToken
        ]);
    }
}

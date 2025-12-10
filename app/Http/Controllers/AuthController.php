<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //memvalidasi inputan
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'pesan' => 'Unauthorized'
            ],  401);
        }

        //jika berhasil login, membuat token sanctum
        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'pesan' => 'Login Berhasil',
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    //menghapus token ketika logout
    public function logout()
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            'pesan' => 'Telah Logout'
        ]);
    }
}
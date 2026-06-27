<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|min:3|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed'
    ]);

    $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => Hash::make($request->password),
    'role' => 'user'
]);

    $token = $user->createToken('token-api')->plainTextToken;

    return response()->json([
        'message' => 'Registrasi berhasil',
        'token' => $token,
        'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email
        ]
    ], 201);
}

    // LOGIN
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login gagal'], 401);
        }

        $token = $user->createToken('token-api')->plainTextToken;

        return response()->json([
            'message' => 'Login berhasil',
            'token' => $token,
            'role' => $user->role,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
        ]);
    }
}
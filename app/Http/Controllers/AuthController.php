<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:255',
            'phone_number' => 'string|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ]);

        // Create user
        $fields['password'] = Hash::make($fields['password']);
        $fields['is_active'] = true;
        $fields['phone_number'] = $fields['phone_number'] ?? null;
        $fields['last_login'] = now();
        $fields['role'] ='admin';
        $user = User::create($fields);


        // Refresh the user to get all attributes including defaults
        $user->refresh();

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $fields['email'])->first();

        if (!$user || !Hash::check($fields['password'],$user->password)){
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        $user->save();

        return response()->json([
            'user' => $user,
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }
}

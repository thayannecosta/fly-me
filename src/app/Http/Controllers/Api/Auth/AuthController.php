<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();
    
    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => false,
            'message' => 'Credenciais inválidas.'
        ], 401);
    }
    return response()->json([
        'status' => true,
        'user' => $user,
        'token' => $user->createToken($request->email)->plainTextToken]);
    }
    public function logout(){
        
        $user = auth()->user();
        $user->tokens()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logout realizado com sucesso.'
        ]);
    }
}

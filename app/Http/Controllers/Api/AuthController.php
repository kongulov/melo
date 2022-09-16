<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\AuthLoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();

        return response()->json([
            'success' => true,
            'user' => $user,
            'authorisation' => [
                'type' => 'Bearer',
                'token' => $token,
            ]
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out',
        ]);
    }

    public function me()
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user(),
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'success' => true,
            'user' => Auth::user(),
            'authorisation' => [
                'type' => 'Bearer',
                'token' => Auth::refresh(),
            ]
        ]);
    }
}

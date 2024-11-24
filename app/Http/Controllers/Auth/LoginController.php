<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password']))){
            return response([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
        ]);
    }

    public function getUser(): \Illuminate\Http\JsonResponse
    {
        $user = request()->user();

        return response()->json([
            'user' => $user,
        ], 200);
    }


}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @return Application|ResponseFactory|\Illuminate\Foundation\Application|Response|void
     */
    public function register(RegisterRequest $request)
    {
        if (User::query()->where('email', $request->email)->exists()){
            return response([
                'message' => 'User already exists!'
            ], 400);
        }

        $insert = User::query()
            ->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

        if($insert){
            return response([
                'message' => 'User successfully registered!'
            ], 200);
        }
    }
}

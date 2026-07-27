<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Here you would typically create the user
        $user = User::create($request->all());

        $response = [];
        $token = $user->createToken('auth-token')->plainTextToken;
        $response['token'] = $token;
        $response['user'] = $user;


        return response()->json([
            'status' => 1,
            'message' => 'User registered successfully',
            'data' => $response,
        ]);
    }
}

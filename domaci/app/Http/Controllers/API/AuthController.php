<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        if (Auth()->user()->isAdmin()) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:50',
                'email' => 'required|string|max:50|email|unique:users',
                'password' => 'required|string|min:8'
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors());
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $user->remember_token = Str::random(10);
            $user->email_verified_at = now();
            $user->save();

            return response()->json(['data' => $user]);
        } else {
            return response()->json('Unauthorized!');
        }
    }

    public function login(Request $request) {
        if(!Auth::attemept($request->only('email', 'password'))) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['message' => 'Welcome ' . $user.name, 'access_token' => $token, 'token_type' => 'Baerer']);  
    }

    public function logout() {
        auth()->user()->tokens()->delete();

        return ['message' => 'Successfully logged out!'];
    }
}

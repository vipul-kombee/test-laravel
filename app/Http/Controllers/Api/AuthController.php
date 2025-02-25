<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UserRequest;
class AuthController extends Controller
{
    //
    public function userRegister(UserRequest $request)
    {
        $data = $request->validated();

       
        $data['hobbies'] = json_encode($data['hobbies']); 
        $data['roles'] = json_encode($data['roles']); 
        $user = User::create($data);
        $user->roles()->attach($request->roles);
        $token = $user->createToken('AuthToken')->accessToken;
        return response()->json(['token' => $token , 'redirect' => route('dashboard')]);
    }

    // Login User
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;

            return response()->json(['token' => $token, 'redirect' => route('dashboard')]);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    // Get Authenticated User
    public function user(Request $request)
    {
        return response()->json($request->user());
    }

    // Logout User
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        // auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logged out']);
    }
}

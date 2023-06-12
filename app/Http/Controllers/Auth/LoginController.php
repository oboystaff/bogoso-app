<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;

class LoginController extends Controller
{
    public function __construct()
    {
    }

    public function login(LoginRequest $request)
    {
        if (!auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        session()->regenerate();

        return response()->json([
            'message' => 'User logged in successfully',
            'data' => $user
        ]);
    }
}

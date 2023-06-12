<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\CreateUserRequest;
use App\Http\Requests\Auth\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $user = User::query()->get();

        return response()->json([
            'message' => 'Get all users',
            'data' => $user,
        ]);
    }

    public function show(User $user)
    {
        return response()->json([
            'message' => 'Get particular user',
            'data' => $user,
        ]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->input('password'));

        $user = User::create($data);

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user,
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->input('password'));

        $user->update($data);

        return response()->json([
            'message' => 'User updated successfully',
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }
}

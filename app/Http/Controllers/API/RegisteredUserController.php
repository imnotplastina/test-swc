<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     */
    public function store(RegisterRequest $request): JsonResponse
    {
        $credentials = $request->validated();
        $credentials['password'] = Hash::make($credentials['password']);

        $user = User::create($credentials);

        event(new Registered($user));

        Auth::login($user);

        return response()->json([
            'error' => null,
            'result' => $user,
        ]);

    }
}

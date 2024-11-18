<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request) :JsonResponse
    {
        try {
            $user = User::query([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return $this->sendSuccess([
                'user' => $user,
                'token' => $token
            ], 'User Created successfully.');
        } catch (Exception $e) {
            return $this->sendError('error', ['errors'=>$e->getMessage()], 500);
        }
    }
}

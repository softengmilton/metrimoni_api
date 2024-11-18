<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\BaseController;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseController
{
    public function login(Request $request): JsonResponse
    {
        try {
            if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
                $user = auth()->user();
                $token = $user->createToken('auth_token')->plainTextToken;
            }
            if (!$user) {
                return $this->sendError('error', ['errors' => 'Invalid credentials.'], 401);
            }
            return $this->sendSuccess([
                'user' => $user,
                'token' => $token
            ], 'Login successfully.');
        } catch (Exception $e) {
            return $this->sendError('error', ['errors' => $e->getMessage()], 500);
        }
    }


    public function logout(Request $request)
    {
        try {
            $request->user()->currentAccessToken()->delete();
            return $this->sendSuccess([], 'Logged out successfully.');
        } catch (Exception $e) {
            return $this->sendError('An error occurred', ['errors' => $e->getMessage()], 500);
        }

    }

}

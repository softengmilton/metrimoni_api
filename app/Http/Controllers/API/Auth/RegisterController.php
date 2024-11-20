<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            $requestData = $request->all();
            $data = $requestData['basicInfo'];

            if (User::where('email', $data['email'])->exists()) {
                return $this->sendError('error', ['errors' => 'Email already exists'], 400);
            }

            $user = User::create([
                'customerId' => $data['customerId'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'user_type' => 'guest',
            ]);

            $profileData = [];

            if (isset($requestData['personalDetails'])) {
                $profileData = array_merge($profileData, $requestData['personalDetails']);
            }

            if (isset($requestData['familyDetails'])) {
                $profileData = array_merge($profileData, $requestData['familyDetails']);
            }

            if (isset($requestData['spouseExpectation'])) {
                $profileData = array_merge($profileData, $requestData['spouseExpectation']);
            }

            if (isset($requestData['agreeMent'])) {
                $agreeMentData = $requestData['agreeMent'];
                if (isset($agreeMentData['agreement'])) {
                    $agreeMentData['agreement'] = $agreeMentData['agreement'] === 'true' ? 1 : 0;
                }
                unset($agreeMentData['photo']);
                $profileData = array_merge($profileData, $agreeMentData);
            }

            if (!empty($profileData)) {
                $user->profile()->updateOrCreate([], $profileData);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            DB::commit();

            return $this->sendSuccess([
                'user' => $user,
                'token' => $token
            ], 'User Created successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError('error', ['errors' => $e->getMessage()], 500);
        }
    }


}

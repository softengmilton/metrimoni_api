<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\MediaMan;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterController extends BaseController
{
    use MediaMan;

    public function register(RegisterRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $requestData = $request->all();
            $data = $requestData['basicInfo'];

            if (User::where('email', $data['email'])->exists()) {
                return $this->sendError('Email already exists.', ['errors' => 'Email already exists'], 400);
            }

            // Create a new user
            $user = User::create([
                'customerId' => $data['customerId'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'phone' => $data['phone'],
                'user_type' => 'guest',
            ]);

            $profileData = [];

            $profileData = array_merge($profileData, $requestData['personalDetails'] ?? []);
            $profileData = array_merge($profileData, $requestData['familyDetails'] ?? []);
            $profileData = array_merge($profileData, $requestData['spouseExpectation'] ?? []);

            if (isset($requestData['agreeMent'])) {
                $agreeMentData = $requestData['agreeMent'];

                $agreeMentData['agreement'] = isset($agreeMentData['agreement']) && $agreeMentData['agreement'] === 'true' ? 1 : 0;

                if ($request->hasFile('agreeMent.photo')) {
                    $photoFile = $request->file('agreeMent.photo');
                    $image = $this->storeFile($photoFile, 'profile');
                    $user->primaryImage()->create([
                        ...$image,
                        'media_role' => 'profile_image',
                    ]);
                }

                $profileData = array_merge($profileData, $agreeMentData);
            }

            unset($profileData['photo']);

            if (!empty($profileData)) {
                $user->profile()->updateOrCreate([], $profileData);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            DB::commit();

            return $this->sendSuccess([
                'user' => $user,
                'token' => $token,
            ], 'User registered successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError('Error occurred during registration.', ['errors' => $e->getMessage()], 500);
        }
    }
}

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

class ProfileController extends BaseController
{
    use MediaMan;

    public function profile(Request $request): JsonResponse
    {
        $user = $request->user()->load(['profile', 'primaryImage']);
        $data = [
            'user' => $user
        ];

        return $this->sendSuccess($data);
    }

    public function updateProfile(RegisterRequest $request, $userId): JsonResponse
    {
        DB::beginTransaction();

        try {
            $user = User::findOrFail($userId);

            $requestData = $request->all();
            $data = $requestData['basicInfo'] ?? [];

            // Check if email already exists, excluding the current user
            if (isset($data['email']) && $data['email'] !== $user->email) {
                if (User::where('email', $data['email'])->where('id', '!=', $user->id)->exists()) {
                    return $this->sendError('Email already exists.', ['errors' => 'Email already exists'], 400);
                }
            }

            $userUpdateData = [
                'customerId' => $data['customerId'] ?? $user->customerId,
                'email' => $data['email'] ?? $user->email,
                'phone' => $data['phone'] ?? $user->phone,
                'user_type' => 'guest',
            ];
            if (!empty($data['password'])) {
                $userUpdateData['password'] = Hash::make($data['password']);
            }

            $user->update($userUpdateData);

            // Prepare profile data
            $profileData = array_merge(
                $requestData['personalDetails'] ?? [],
                $requestData['familyDetails'] ?? [],
                $requestData['spouseExpectation'] ?? []
            );

            if (isset($requestData['agreeMent'])) {
                $agreeMentData = $requestData['agreeMent'];
                $agreeMentData['agreement'] = isset($agreeMentData['agreement']) && $agreeMentData['agreement'] === 'true' ? 1 : 0;

                if ($request->hasFile('agreeMent.photo')) {
                    $photoFile = $request->file('agreeMent.photo');
                    $this->deletePrimaryImage($user);
                    $image = $this->storeFile($photoFile, 'profile');
                    $user->primaryImage()->updateOrCreate(
                        ['media_role' => 'profile_image'],
                        $image
                    );
                }
                $profileData = array_merge($profileData, $agreeMentData);
            }

            // Remove the photo field from profile data
            unset($profileData['photo']);

            if (!empty($profileData)) {
                $user->profile()->updateOrCreate([], $profileData);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            DB::commit();

            return $this->sendSuccess([
                'user' => $user,
                'token' => $token,
            ], 'User profile updated successfully.');
        } catch (Exception $e) {
            DB::rollBack();
            return $this->sendError('Error occurred during update.', ['errors' => $e->getMessage()], 500);
        }
    }

    private function deletePrimaryImage(User $user): void
    {
        if ($user->primaryImage && $user->primaryImage()->exists()) {
            $primaryImage = $user->primaryImage;
            $this->deleteFile($primaryImage->name, 'profile_image');
            $primaryImage->delete();
        }
    }


}

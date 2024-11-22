<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends BaseController
{
    public function profile(Request $request) :JsonResponse
    {
        $user = $request->user()->load(['profile', 'primaryImage']);
        $data = [
            'user' => $user
        ];

        return $this->sendSuccess($data);
    }
}

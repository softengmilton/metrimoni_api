<?php

namespace App\Http\Controllers\API\Portal;

use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ExploreController extends BaseController
{
    public function profileList(): JsonResponse
    {
        $profiles = User::where('user_type', 'guest')
            ->with([
                'profile.region',
                'profile.community',
                'profile.spouseRegion',
                'profile.spouseCommunity'
            ])
            ->orderBy('created_at', 'desc')
            ->get();

        $data = [
            'profiles' => $profiles
        ];

        return $this->sendSuccess($data);
    }

}

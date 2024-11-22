<?php

namespace App\Http\Controllers\API\Portal;

use App\Http\Controllers\BaseController;
use App\Models\Community;
use App\Models\Region;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FilterController extends BaseController
{
    public function getOption(): JsonResponse
    {

        $options = config('profileConfig');
        $regions = Region::all();
        $data = [
            'options' => $options,
            'regions' => $regions,
        ];
        return $this->sendSuccess($data);
    }

    public function getCouncil(Request $request, $region) :JsonResponse
    {
        $councils = Community::where('region_id', $region)->get();

        $data = [
            'councils' => $councils
        ];
        return $this->sendSuccess($data);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;

class LocationController extends Controller
{
    use ApiResponseTrait;
    //
    public function getStates(): JsonResponse
    {
        $states = State::orderBy('name')->get();
        return $this->successResponse($states, 'success', 200);
    }

    public function getCities(Request $request): JsonResponse
    {
        $cities = City::select(['id', 'name'])->where('state_id', $request->state_id)->orderBy('name')->get();
        return $this->successResponse($cities, 'success', 200);
    }
}

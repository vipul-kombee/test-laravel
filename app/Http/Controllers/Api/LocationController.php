<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    //
    public function getStates(): JsonResponse
    {
        $states = State::orderBy('name')->get();

        return response()->json([
            'status' => 'success',
            'data' => $states
        ], 200);
    }

    public function getCities(Request $request): JsonResponse
    {
        // $state_id = $request->state_id;
        // $validator = Validator::make(['state_id' => $state_id], [
        //     'state_id' => 'required|integer|exists:states,id'
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => $validator->errors()
        //     ], 422);
        // }

        // $cities = City::where('state_id', $state_id)->orderBy('name')->get();

        // return response()->json([
        //     'status' => 'success',
        //     'data' => $cities
        // ], 200);
        $cities = City::select(['id', 'name'])->where('state_id', $request->state_id)->get();

        return response()->json(['data' => $cities]);
    }
}

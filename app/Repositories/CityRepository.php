<?php

namespace App\Repositories;

use App\Http\Resources\CityResource;
use App\Models\City;

class CityRepository
{

    public function all()
    {
        $city = CityResource::collection(City::all());

        if ($city) {
            return response()->json([
                'status' => 200,
                'city' => $city
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Not found any cities'
        ]);
    }


    public function findById($id)
    {
        $city = CityResource::collection(City::where('id', $id)->get());

        if ($city && City::whereId($id)->exists()) {
            return response()->json([
                'status' => 200,
                'city' => $city
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'City is not found'
        ]);
    }

}

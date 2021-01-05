<?php

namespace App\Repositories;

use App\Http\Resources\BalancePackageResource;
use App\Models\BalancePackage;

class BalancePackageRepository
{

    public function all()
    {
        $balancepackages = BalancePackageResource::collection(BalancePackage::active()->get());

        if ($balancepackages->isEmpty()) {

            return response()->json([
                'status' => 200,
                'balancepackages' => $balancepackages
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'not found any balance package'
        ]);
    }


    public function findById($id)
    {
        $balancepackage = BalancePackageResource::collection(
            BalancePackage::where('id', $id)->active()->get()
        );

        if ($balancepackage && BalancePackage::whereId($id)->exists()) {

            return response()->json([
                'status' => 200,
                'balancepackage' => $balancepackage
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'this balance package not found or not available'
        ]);
    }

}

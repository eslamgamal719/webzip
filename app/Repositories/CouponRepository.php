<?php

namespace App\Repositories;


use App\Http\Resources\CouponResource;
use App\Models\Coupon;

class CouponRepository
{

    public function all()
    {
        $coupons = CouponResource::collection(Coupon::all());

        if ($coupons) {
            return response()->json([
                'status' => 200,
                'coupon' => $coupons
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Not found any Coupons'
        ]);
    }


    public function findById($id)
    {
        $coupon = CouponResource::collection(Coupon::where('id', $id)->get());

        if ($coupon && Coupon::whereId($id)->exists()) {
            return response()->json([
                'status' => 200,
                'Coupon' => $coupon
            ]);
        }

        return response()->json([
            'status' => 404,
            'message' => 'Coupon is not found'
        ]);
    }

}

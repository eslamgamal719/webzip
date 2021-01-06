<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Coupon;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Repositories\CouponRepository;


class CouponController extends Controller
{
    private $couponRepository;

    public function __construct(CouponRepository $couponRepository)
    {
        $this->couponRepository = $couponRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return $this->couponRepository->all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CouponRequest $request)
    {
        try {
            Coupon::create([
                'promo_code' => $request->promo_code,
                'discount_type' => $request->discount_type,
                'discount_limit' => $request->discount_limit,
                'discount_value' => $request->discount_value,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                'message' => 'Coupon is made successfully'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->couponRepository->findById($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CouponRequest $request, $id)
    {
        try {
            $coupon = Coupon::findOrFail($id);
            $coupon->update([
                'promo_code' => $request->promo_code,
                'discount_type' => $request->discount_type,
                'discount_limit' => $request->discount_limit,
                'discount_value' => $request->discount_value,
                'user_id' => $request->user_id,
            ]);

            return response()->json([
                'message' => 'Coupon is updated successfully'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $coupon = Coupon::findOrFail($id);
            $coupon->delete();

            return response()->json([
                'message' => 'Coupon is Deleted successfully'
            ], 200);

        } catch(\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }
}

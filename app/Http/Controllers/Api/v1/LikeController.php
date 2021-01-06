<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Like;
use App\Http\Requests\LikeRequest;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{

    public function store(LikeRequest $request)
    {
        try {
            Like::create([
                'user_id' => $request->user_id,
                'ad_id' => $request->ad_id
            ]);

            return response()->json([
                'message' => 'You liked this Ad'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }


    public function destroy($id)
    {
        try {
            $like = Like::find($id);
            $like->delete();
            return response()->json([
                'message' => 'You removed like of this Ad'
            ], 200);

        } catch (\Exception $ex) {
            $message = $ex->getMessage();
            return response()->json($message, 400);
        }
    }

}

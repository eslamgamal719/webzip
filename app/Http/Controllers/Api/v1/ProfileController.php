<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileRequest;


class ProfileController extends Controller
{

    public function updateProfile(ProfileRequest $request) {

        $user = User::find(Auth::id());

        $user->update($request->except('_token'));

        return response()->json(['message' => 'تم التحديث بنجاح'], 200);
    }

}

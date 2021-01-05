<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\User;//you forget
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {

        $credentials = $request->only('phone', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'phone' => 'required|string|max:14',
            'bio' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'bio' => $request->get('bio'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }


    public function update(Request $request, $id) {

        $validator = Validator::make($request->all(), [
            "first_name" => 'required|max:50',
            'last_name'  => 'required|max:50',
            'phone'      => 'required|unique:users,phone|max:14',
            'email'      => 'required|unique:users,email|email',
            'bio'        => 'nullable|max:50'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::find($id);

        $user->update([
            'frist_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'bio' => $request->bio,
            'email' => $request->email,
        ]);

        return response()->json([
            'message' => 'تم التحديث بنجاح',
            'user' => $user
        ], 200);
    }



    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json(compact('user'));
    }

/*
    public function userProfile() {
        return response()->json(auth()->user());
    }

*/

    public function postReset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

        $response = $this->passwords->reset($credentials, function ($user, $password) {
            $user->password = bcrypt($password);

            $user->save();

            $token = \JWTAuth::fromUser($user);
            return \Response::json(compact('token'));
        });

        switch ($response) {
            case PasswordBroker::PASSWORD_RESET:
                return redirect($this->redirectPath());

            default:
                return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
        }
    }

}

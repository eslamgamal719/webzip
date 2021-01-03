<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', 'Api\v1\UserController@register');
Route::post('login', 'Api\v1\UserController@authenticate');
Route::get('open', 'Api\v1\DataController@open');
Route::post('password/reset', 'Api\v1\ResetPasswordController@recover')->name('password.reset');
Route::post('password/change', 'Api\v1\PasswordResetRequestController@passwordResetProcess');

Route::group(['middleware' => ['jwt.verify']], function() {
Route::get('user', 'Api\v1\UserController@getAuthenticatedUser');
Route::get('closed', 'Api\v1\DataController@closed');
Route::apiResources(['/v1/balancepackages'=> 'api\v1\BalancePackageController'],
    ['only' => ['index', 'show']]);


Route::apiResources(['/v1/categories' => 'api\v1\CategoryController'], ['only' => ['index', 'show']]);

});

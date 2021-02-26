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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// GET email/verified/:id
Route::get('email/verified/{id}', 'VerificationController@verified')->name('verification');

Route::group([
    'prefix' => 'auth',
], function () {

     Route::post('login', 'Auth\AuthController@login')->name('login');

     Route::post('register', 'Auth\AuthController@register');

     Route::post('resend', 'Auth\AuthController@resendEmail');

     Route::get('loginfailed', function () {
        return response()->json(['error' => 'Unauthenticated'], 401);
    })->name('loginfailed');

    Route::group([
        'middleware' => 'auth:api',
      ], function() {

          Route::get('logout', 'Auth\AuthController@logout');

          Route::get('me', 'Auth\AuthController@user');

          Route::post('refresh', 'Auth\AuthController@refreshToken');
   });

});

Route::group([
    'middleware' => 'auth:api',
  ], function() {

      Route::get('users', 'User\UserController@index');

      Route::get('user/show/images/{user}', 'Payments\PaymentControlle@checkImages');

      Route::post('user/cash/{user}', 'Payments\PaymentController@updateCash');

      Route::post('user/images', 'Payments\PaymentController@updateImages');
});

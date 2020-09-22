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

// Api Eat
Route::group(['namespace' => 'Api\Food'], function ()  {
    Route::get('/food/random', 'FoodRandomController@randomFood');
    Route::apiresource('/food', 'FoodController');
});


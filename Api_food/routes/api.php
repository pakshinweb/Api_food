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
//, 'middleware' => 'auth:api'
Route::group(['prefix' => 'food', 'namespace' => 'Api\Food'], function ()  {

Route::apiresource('/', 'FoodController');
Route::apiresource('/category', 'CategoryController');

});

// Api Eat
Route::group(['prefix' => 'food', 'namespace' => 'Api\Food'], function ()  {

    Route::get('/now', 'FoodController@getNowFood');
    Route::get('/random', 'FoodController@getFoodRandom');
    Route::get('/breakfast', 'FoodController@getFoodByCategory');
    Route::get('/lunch', 'FoodController@getFoodByCategory');
    Route::get('/dinner', 'FoodController@getFoodByCategory');
    Route::get('/snack', 'FoodController@getFoodByCategory');

});


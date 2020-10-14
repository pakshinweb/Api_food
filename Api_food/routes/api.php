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

Route::group(['namespace' => 'Api\Food', 'middleware' => 'jwt.verify'], function () {
    Route::apiresource('food', 'FoodController')->only(['store','update','destroy']);
    Route::apiresource('/food/category', 'CategoryController');
});

Route::post('/login', 'Api\Food\LoginController@login');
//,'middleware' => 'jwt.verify'
Route::group(['namespace' => 'Api\Food','middleware' => 'jwt.verify','middleware' => 'jwt.verify'], function () {
    Route::get('/phpinfo', 'LoginController@phpinfo');
    Route::post('/logout', 'LoginController@logout');
    Route::post('/refresh', 'LoginController@refresh');
    Route::post('/me', 'LoginController@me');
});

Route::group(['prefix' => 'food', 'namespace' => 'Api\Food'], function ()  {
    Route::get('/', 'FoodController@index');
    Route::get('/{id}', 'FoodController@show')->where('id', '[0-9]+');
    Route::get('/now', 'GetFoodController@getFoodNow');
    Route::get('/random', 'GetFoodController@getFoodRandom');
    Route::get('/{name}', 'GetFoodController@getFoodByCategory');
});





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

//'middleware' => 'jwt.verify'

Route::group(['prefix' => 'food', 'namespace' => 'Api\Food', 'middleware' => 'jwt.verify'], function ()  {
    Route::apiresource('/', 'FoodController');
    Route::apiresource('/category', 'CategoryController');
});

Route::group(['namespace' => 'Api\Food', 'middleware' => 'jwt.verify'], function () {
    Route::get('/phpinfo', 'LoginController@phpinfo');
    Route::post('/logout', 'LoginController@logout');
    Route::post('/refresh', 'LoginController@refresh');
    Route::post('/me', 'LoginController@me');
});

Route::group(['prefix' => 'food', 'namespace' => 'Api\Food'], function ()  {
    Route::get('/{id}', 'FoodController@show')->where('id', '[0-9]+');;
    Route::get('/now', 'GetFoodController@getFoodNow');
    Route::get('/random', 'GetFoodController@getFoodRandom');
    Route::get('/breakfast', 'GetFoodController@getFoodByCategory');
    Route::get('/lunch', 'GetFoodController@getFoodByCategory');
    Route::get('/dinner', 'GetFoodController@getFoodByCategory');
    Route::get('/snack', 'GetFoodController@getFoodByCategory');
});

Route::post('/login', 'Api\Food\LoginController@login');



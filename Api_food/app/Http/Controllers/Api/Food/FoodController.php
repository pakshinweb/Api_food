<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Requests\FoodStoreRequest;
use App\Http\Requests\FoodUpdateRequest;
use App\Models\Food;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoodController extends Controller
{

    public function index()
    {
        return response(Food::all());
    }

    public function show($id)
    {
        return response(Food::findOrFail($id));
    }

    public function store(FoodStoreRequest $request)
    {
        Food::create($request->all());
        return response('',201);
    }

    public function update(FoodUpdateRequest $request, $id)
    {
        $food = Food::find($id);
        $food->fill($request->all());
        $food->save();

        return response($food);
    }

    public function destroy($id)
    {
        Food::destroy($id);
        return response('',200);
    }

    public function getFoodRandom()
    {

        return response(Food::inRandomOrder()->limit(1)->get());
    }

    public function getFoodByTime()
    {
        date_default_timezone_set(env('TIMEZONE',null));
        $now_time = time();
        print_r(getdate($now_time));



    }

    public function getFoodByCategory(Request $request)
    {
        $url = explode('/', $request->url());
        $name_category = end($url);

        return Food::getFoodByCategory($name_category);

    }


}

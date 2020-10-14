<?php

namespace App\Http\Controllers\Api\Food;


use App\Models\Food;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GetFoodController extends Controller
{

    public function getFoodRandom()
    {
        return response(Food::inRandomOrder()->limit(1)->get());
    }

    public function getFoodNow()
    {
        return Food::getFoodByCategory(Category::getNowIdCategory());
    }

    public function getFoodByCategory($name)
    {
        return Food::getFoodByCategory($name);
    }

}

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

        return Food::getFoodByIdCategory(Category::getNowIdCategory());
    }

    public function getFoodByCategory(Request $request)
    {
        $url = explode('/', $request->url());
        $nameCategory = end($url);
        $idCategory = Category::getIdCategory($nameCategory);

        return Food::getFoodByIdCategory($idCategory);

    }


}

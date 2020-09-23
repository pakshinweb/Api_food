<?php


namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use App\Models\Food;

class FoodRandomController extends Controller
{
    public function randomFood()
    {

        return response(Food::inRandomOrder()->limit(1)->get());
    }
}


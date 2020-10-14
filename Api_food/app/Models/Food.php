<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name','glycaemic_index','category_id'];

    static public function getFoodByCategory($name)
    {
        $result = array_search($name, array_keys(Category::INTERVAL));
        if ( $result === false){
            return response('',404);
        }
        $result += 1;

       return Food::inRandomOrder()
           ->where('category_id', $result)
           ->limit(1)
           ->get();
    }



}

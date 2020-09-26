<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = ['name','glycaemic_index','category_id'];

    static public function getFoodByCategory($name_category)
    {
       $id_category = Category::getIdCategory($name_category);

       return Food::inRandomOrder()
           ->where('category_id', $id_category)
           ->limit(1)
           ->get();
    }


}

<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = ['name'];

    protected static $category_id = [
        1 => 'breakfast',   // from 7 to 11
        2 => 'lunch',       // from 13 to 15
        3 => 'dinner',      // from 18 to 20
        4 => 'snack',       // at another time(12,16,17)
    ];

    static public function getIdCategory($name)
    {
        $arr = self::$category_id;
        return array_search($name, $arr);
    }

}

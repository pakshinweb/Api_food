<?php

namespace App\Models\ApiFoods;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = [
        'name','category_id'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

<?php

namespace App\Models\ApiFoods;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];

    public function food()
    {
        return $this->hasMany('App\Food');
    }

}

<?php

namespace App\Models\Api\Book;

use App\Services\App\Book\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    const DRAFT         = 1;
    const PRODUCTION    = 2;
    const PRINTING      = 3;
    const RELEASED      = 4;

    protected $table = 'books';
    protected $fillable = [
        'name','status'
    ];

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

}

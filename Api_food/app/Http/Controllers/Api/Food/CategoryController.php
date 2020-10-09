<?php

namespace App\Http\Controllers\Api\Food;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        return response(Category::all());
    }

    public function show($id)
    {
        return response(Category::findOrFail($id));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return response('',201);
    }

    public function update(Request $request, $id)
    {
        $food = Category::find($id);
        $food->fill($request->all());
        $food->save();

        return response($food);
    }

    public function destroy($id)
    {
        Category::destroy($id);
        return response('',200);
    }

}

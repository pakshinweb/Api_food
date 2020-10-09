<?php

namespace App\Http\Controllers\Api\Food;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        return response(User::all());
    }

    public function show($id)
    {
        return response(User::findOrFail($id));
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $data['api_token'] = Str::random(60);
        User::create($data);
        return response('',201);
    }

    public function update(UserStoreRequest $request, $id)
    {
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        return response($user);
    }

    public function destroy($id)
    {
        User::destroy($id);
        return response('',200);
    }

}

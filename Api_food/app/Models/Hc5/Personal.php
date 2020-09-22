<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $type_person;
    protected $login;
    protected $password;

    public function createPerson(Request $request)
    {
        dd($request);
    }

    public function store(Request $request)
    {


        $login =        $request->input('login');
        $pass =         $request->input('pass');
        $repet_pass =   $request->input('repet_pass');




    }

    public function deletePerson(Request $request)
    {
        dd($request->all());
    }




}

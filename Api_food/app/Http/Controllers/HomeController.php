<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {


        \App\Events\PablicChat::dispatch('Message');

        return view('home');
    }

}

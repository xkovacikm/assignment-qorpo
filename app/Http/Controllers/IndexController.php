<?php

namespace App\Http\Controllers;

use http\Cookie;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        //\Illuminate\Support\Facades\Cookie::queue("access_token", "1234567890");

        //dump(\Illuminate\Support\Facades\Cookie::get("access_token"));
        return view("index");
    }
}

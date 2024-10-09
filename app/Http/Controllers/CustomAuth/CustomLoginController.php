<?php

namespace App\Http\Controllers\CustomAuth;

use App\Http\Controllers\Controller;

class CustomLoginController extends Controller
{
    public function login(){
        return view("custom-auth.login");
    }
}

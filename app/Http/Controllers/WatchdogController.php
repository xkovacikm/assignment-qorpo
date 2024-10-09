<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchdogController extends Controller
{

    public function index(){
        return view("watchdogs.index");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class CurrencyController extends Controller
{
    //

    public function index()
    {
        return view("currency.index");
    }

    public function show(Currency $currency)
    {
        return view("currency.show",
            [
                "model" => $currency
            ]
        );
    }
}

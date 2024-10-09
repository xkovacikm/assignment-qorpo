<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrencyIndexCollection;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $models = Currency::paginate(10);
        return new CurrencyIndexCollection($models);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Currency $currency)
    {
        return response()->json($currency);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Currency $currency)
    {
        //
    }
}

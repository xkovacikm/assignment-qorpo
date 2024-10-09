@extends("layouts.app")

@section("content")
    <h1>
        {{ $model->name }}
        <img src="{{$model->image_url}}" class="img-fluid" style="width:30px">
        <span class="h4 ms-3">({{$model->symbol}})</span>
    </h1>

    <div><b>{{__("Current price:")}}</b> {{$model->current_price}}</div>
    <div><b>{{__("Diff in last 24h:")}}</b> {{$model->price_change_percentage_24h}}</div>
    <div class="mt-5"><b>{{__("Market cap:")}}</b> {{$model->market_cap}}</div>

    <create-watchdog coin_id="{{$model->coin_id}}"></create-watchdog>
@endsection

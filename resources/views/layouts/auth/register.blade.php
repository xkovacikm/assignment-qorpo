@extends("layouts.app")

    <div class="row">
        <div class="col">
            <h1>{{__("Login")}}</h1>
            <form method="POST" action="{{route("login")}}">
                @csrf
                <input type="text" name="email" placeholder="{{__("Email")}}">
                <input type="password" name="password" placeholder="{{__("Password")}}">
            </form>
        </div>
    </div>
@section("content")
@endsection

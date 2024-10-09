<!doctype html>
<html lang="en">
<head>
    @include("layouts.app.head")
</head>
<body id="app" class="bg-light">
    @include("layouts.app.header")

    <div class="container mt-5">
        <div class="bg-white p-5 rounded shadow">
            @yield('content')
        </div>

    </div>

    @include("layouts.app.after_body")
</body>
</html>

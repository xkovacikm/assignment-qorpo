<!doctype html>
<html lang="en">
<head>
    @include("layouts.app.head")
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    @include("layouts.app.after_body")
</body>
</html>

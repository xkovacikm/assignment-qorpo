<div class="bg-white shadow">
    <div class="container bg-white">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a href="{{ route("register") }}" class="nav-link {{ Route::is("register") ? "active" : null }}" aria-current="page">
                        Register
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("login") }}" class="nav-link {{Route::is("login") ? "active" : null }}">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("currencies.index") }}" class="nav-link {{ Route::is("currencies.*") ? "active" : null }}">
                        Currencies
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route("watchdogs.index") }}" class="nav-link {{Route::is("watchdogs.*") ? "active" : null }}">
                        Watchdogs
                    </a>
                </li>
            </ul>
        </header>
    </div>
</div>


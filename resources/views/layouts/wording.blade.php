<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>{{ config('app.name', 'MyApp') }}</title>
    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ URL::asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />

</head>

<body>
    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm">
            <a href="{{ url('/') }}" class="app-logo text-secondary">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
{{--                        <a class="nav-link " href="{{ route('what') }}">C'est quoi GoodVibezzz ?</a>--}}
                        <a class="nav-link " href="#">C'est quoi Weigu ?</a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('login', ['src' => 'navbar_link', 'action' => 'login']) }}">{{ __('Login') }}<span
                                class="sr-only">(current)</span></a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('register', ['src' => 'navbar_link', 'action' => 'login']) }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

    <!-- Begin page content -->
    <main class="pt-4">
        @yield('content')
    </main>
    <footer class="wording-footer" style="font-size: smaller;">
        @yield('footer', view('partials._footer'))
    </footer>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>

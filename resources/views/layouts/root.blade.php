<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>{{ config('app.name', 'MyApp') }}</title>
    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
        ::-webkit-scrollbar {
            width: 0px !important;
            position: static;
        }
    </style>
</head>

<body class="josefin">
<header class="myheader">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md justify-content-between">
        <div class="mobilenav">
            <a href="https://weigu-app.com" class="app_logo hideitdesktop">
                <h1>Weigu</h1>
            </a>
            <i class="burger-menu bi bi-list"></i>
        </div>
        <ul class="d-flex justify-content-between nav-right">
            <li><a href="/about">A propos</a></li>
            <li><a href="/algorithme">L'algorithme</a></li>
            <li><a href="/informations">Informations</a></li>
        </ul>
    </nav>
</header>
@yield('content')
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(".burger-menu").click(function () { //use a class, since your ID gets mangled
        $(".navbar").toggleClass("clicked"); //add the class to the clicked element
    });
</script>
@yield('scripts')
</body>

</html>

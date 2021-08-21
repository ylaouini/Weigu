<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MyApp') }}</title>

    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon"/>
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <style type="text/css">
        .myheader {
            position: relative;
            background-color: #ffba39;
        }

        @media (max-width: 768px) {
            .myheader {
                position: fixed;
            }

            .paddingtop {
                padding-top: 6rem !important;
            }
        }
    </style>
</head>

<body class="homepage d-flex flex-column justify-content-between josefin">
<header class="myheader">
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md justify-content-between">
        <div class="mobilenav">
            <a href="https://weigu-app.com" class="app-logo">
                <h1>Weigu</h1>
            </a>
            <i class="burger-menu bi bi-list"></i>
        </div>
        <ul class="d-flex justify-content-between nav-right">
            <li><a href="/about">A propos</a></li>
            <li><a href="/algorithme" class="active">L'algorithme</a></li>
            <li><a href="/informations">Informations</a></li>
        </ul>
    </nav>
</header>
<!-- Begin page content -->
<div class="about-content paddingtop center hideitdesktop p-4 d-flex flex-column">
    <h2 class="cover-heading pb-3">Comment fonctionne l'algorithme de mise en relation ?</h2>
    <p><span class="fontplus">Le but de l'algorithme de mise en relation est de maximiser la probabilité que chacune de tes questions trouve une réponse.</span><br/>
        Pour celà, notre algorithme d'intelligence artificielle envoie chacune de tes questions aux utilisateurs les
        plus susceptibles d'être intéressés par la sujet dont tu souhaites parler et donc, les plus suceptibles de te
        répondre. Notre base de donnée contient actuellement quelques centaines d'utilisateurs, et ce chiffre ne cesse
        d'augmenter (nous finirons bien par te trouver quelqu'un qui partage tes questionnements 😉).
    </p>
</div>
<div class="hideitmobile about-content p-0 paddingtop p-4 d-flex flex-row" style="width: 80%;">
    <div class="col-md-6 d-flex">
        <h2 class="cover-heading centring pb-3">Comment fonctionne l'algorithme de mise en relation ?</h2>
    </div>
    <div class="col-md-6 d-flex">
        <p class="centring"><span class="fontplus">Le but de l'algorithme de mise en relation est de maximiser la probabilité que chacune de vos
                    questions trouve une réponse.</span>
            Pour celà, notre algorithme d'intelligence artificielle envoie votre message aux utilisateurs les plus
            suscèptibles d'être intéressés par la sujet de votre question et donc les plus suceptibles de votre
            répondre. Notre base de donnée contient actuellement quelques centaines d'utilisateurs, et ce chiffre ne
            cesse d'augmenter (nous finirons bien par vous trouver quelqu'un qui partage vos questionnements 😉).
        </p>
    </div>
</div>
<footer class="footer" style="font-size: smaller;">
    @yield('footer', view('partials._footer'))
</footer>
<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script>
    $(".burger-menu").click(function () { //use a class, since your ID gets mangled
        $(".navbar").toggleClass("clicked"); //add the class to the clicked element
    });
</script>
@yield('scripts')
</body>

</html>

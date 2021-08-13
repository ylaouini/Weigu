<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'MyApp') }}</title>

    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="{{ asset('css/datepicker.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style type="text/css">
        .btn.btn-secondary {
            color: #444;
            background-color: #fff;
        }

        .btn.btn-primary {
            background-color: #00B8FF;
            color: #fff;
            border: none;
        }

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
                <li><a href="/algorithme">L'algorithme</a></li>
                <li><a href="/informations" class=" active">Informations</a></li>
            </ul>
        </nav>
    </header>
    <!-- Begin page content -->
    <div class="about-content paddingtop p-4 d-flex flex-column">
        <h2 id="sécurité" class="cover-heading pb-3">Sécurité</h2>
        <p>Votre sécurité est notre priorité.
            Enfin que votre exérience sur Weigu soit la meilleure possible, nous vous recommandons très fortement de suivre
            les conseils suivants:<br />
            1. N'échangez jamais vos informations personnelles (votre adresse par exemple) avec des personnes que vous ne
            connaissez pas.<br />
            2. Ne répondez pas aux messages désobligeants (trolls, messages publictaires): Nous travaillons à ce que vous ne
            receviez plus de tels messages.<br />
            3. N'hésitez pas à nous écrire à hello@weigu-app.com, pour nous faire par de vos retours d'expérience sur la
            plateforme. C'est pour vous que nous faisons tout ça : Si vous êtes heureux, alors notre une mission accomplie
            🥰.
        </p>
        <h2 id="confidentialité" class="cover-heading pb-3">Confidentialité</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </p>
        <h2 id="mentions_légales" class="cover-heading pb-3">Mentions légales</h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
            magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
            laborum.
        </p>
    </div>


    <footer class="footer" style="font-size: smaller;">
        @yield('footer', view('partials._footer'))
    </footer>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(".burger-menu").click(function() { //use a class, since your ID gets mangled
            $(".navbar").toggleClass("clicked"); //add the class to the clicked element
        });
    </script>
    @yield('scripts')
</body>

</html>

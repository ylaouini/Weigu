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
                <li><a href="/algorithme" class="active">L'algorithme</a></li>
                <li><a href="/informations">Informations</a></li>
            </ul>
        </nav>
    </header>
    <!-- Begin page content -->
    <div class="about-content paddingtop p-4 d-flex flex-column">
        <h2 class="cover-heading pb-3">Comment fonctionne l'algorithme de mise en relation ?</h2>
        <p> Le but de l'algorithme de mise en relation est de maximiser la probabilité que chacune de vos
            questions trouve une réponse.<br />Pour celà, l’algorithme envoie votre message à 15 utilisateurs aléatoires, et
            cela toutes les 12 heures jusqu’à ce que vous finissez par obtenir une première réponse. Notre base de donnée
            contient actuellement quelques centaines d'utilisateurs, et ce chiffre ne cesse d'augmenter (nous finirons bien
            par vous trouver quelqu'un qui partage vos questionnements 😉). Si vous recevez un message de type "troll", vous
            avez la possibilité de bloquer l'auteur du message. Un utilisateur dont le message a été bloqué 15 fois vera son
            compte automatiquement bloqué. Nous avons pensé cet algorithme afin que vous puissiez toujours recevoir des
            questions sérieuses. Nous travaillons sur un algorithme d'intelligence artificielle qui bloquera automatiquement
            les messages de type "troll" ou publicitaires afin de maintenir la qualité des messages que vous recevrez. Si
            votre compte a été bloqué injustement, vous pouvez nous écrire à <br />hello@weigu-app.com
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

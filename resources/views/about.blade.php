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
                <li><a href="/about" class="active">A propos</a></li>
                <li><a href="/algorithme">L'algorithme</a></li>
                <li><a href="/informations">Informations</a></li>
            </ul>
        </nav>
    </header>
    <!-- Begin page content -->
    <div class="about-content paddingtop p-4 d-flex flex-column">
        <h2 class="cover-heading pb-3">Notre mission</h2>
        <p>Nous voulons changer les choses et nous y croyons vraiment.
            Nous rêvons d’un monde dans lequel vous pourrez parler de sujets « graves », sans plus avoir peur de passer pour cet ami qui plombe l’ambiance.
            Nous croyons que le bonheur est le but de la vie, mais nous croyons aussi que la vie n’est pas un long fleuve tranquille : Il existe des moments où on a besoin de parler de sujets profonds.
            Nous voulons connecter les gens autrement.
        </p>
        <h2 class="cover-heading pb-3">C'est quoi Weigu ?</h2>
        <p>
            Weigu est une plateforme de discussion qui fonctionne sur la base de questions-réponses anonymes.
            Nous avons pensé notre algorithme de mise en relation afin que chacune de vos questions puisse toujours trouver une réponse.
        </p>
        <h2 class="cover-heading pb-3">Contact </h2>
        <p>
            Vous n'avez obtenu aucune réponse à l'une de vos questions ?
            Des remarques ou des plaintes à nous adresser ? Vous souhaitez juste dire bonjour 😊 ?
            Ecrivez-nous à hello@weigu-app.com
$        </p>
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

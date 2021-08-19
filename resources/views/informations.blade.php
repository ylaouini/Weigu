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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
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
                <li><a href="/algorithme">L'algorithme</a></li>
                <li><a href="/informations" class=" active">Informations</a></li>
            </ul>
        </nav>
    </header>
    <!-- Begin page content -->
    <div class="about-content paddingtop p-4 d-flex flex-column">
        <h2 id="sécurité" class="cover-heading pb-3">Sécurité</h2>
        <p><span class="fontplus">Votre sécurité est notre priorité.</span>
            <br>Enfin que votre exérience sur Weigu soit la meilleure possible, nous vous recommandons très fortement de suivre les conseils suivants:
            <br>1. N'échangez jamais vos informations personnelles avec des personnes que vous ne connaissez pas.
            <br>2. Ne répondez pas aux messages désobligeants (trolls, messages publictaires)
            <br>3. N'hésitez pas à nous écrire à hello@weigu-app.com, pour nous faire par de vos retours d'expérience sur la plateforme.
        </p>
        <h2 id="confidentialité" class="cover-heading pb-3">Confidentialité</h2>
        <p>
            <br><span class="fontplus">Politique de confidentialité</span>
            <br>Le site web https://weigu-app.com est détenu par Weigu, qui est un contrôleur de données de vos données personnelles. Nous avons adopté cette politique de confidentialité, qui détermine la manière dont nous traitons les informations collectées par https://weigu-app.com, qui fournit également les raisons pour lesquelles nous devons collecter certaines données personnelles vous concernant. Par conséquent, vous devez lire cette politique de confidentialité avant d'utiliser le site web de https://weigu-app.com. Nous prenons soin de vos données personnelles et nous nous engageons à en garantir la confidentialité et la sécurité.
            <br><span class="fontplus">Les informations personnelles que nous collectons</span>
            <br>Lorsque vous visitez le https://weigu-app.com, nous recueillons automatiquement certaines informations sur votre appareil, notamment des informations sur votre navigateur web, certains des cookies installés sur votre appareil. Nous désignons ces informations collectées automatiquement par le terme "informations sur les appareils". En outre, nous pourrions collecter les données personnelles que vous nous fournissez (le genre, l'adresse mail) lors de l'inscription afin de pouvoir exécuter le contrat.
            <br><span class="fontplus">Pourquoi traitons-nous vos données ?</span>
            <br>Notre priorité absolue est la sécurité des données des utilisateurs et, à ce titre, nous ne pouvons traiter que des données minimales sur les utilisateurs, uniquement dans la mesure où cela est absolument nécessaire pour maintenir le site web. Les informations collectées automatiquement sont utilisées uniquement pour identifier les cas potentiels d'abus et établir des informations statistiques concernant l'utilisation du site web. Ces informations statistiques ne sont pas autrement agrégées de manière à identifier un utilisateur particulier du système. Les utilisateurs qui ne savent pas quelles informations sont obligatoires sont invités à nous contacter via hello@weigu-app.com.
            <br><span class="fontplus">Vos droits</span>
            <br>Si vous êtes un résident européen, vous disposez des droits suivants liés à vos données personnelles : Le droit d'être informé. Le droit d'accès. Le droit de rectification. Le droit à l'effacement. Le droit de restreindre le traitement. Le droit à la portabilité des données. Le droit d'opposition. Les droits relatifs à la prise de décision automatisée et au profilage. Si vous souhaitez exercer ce droit, veuillez nous contacter via les coordonnées ci-dessous.
            <br><span class="fontplus">Liens vers d'autres sites web</span>
            <br>Notre site web peut contenir des liens vers d'autres sites web qui ne sont pas détenus ou contrôlés par nous. Sachez que nous ne sommes pas responsables de ces autres sites web ou des pratiques de confidentialité des tiers. Nous vous encourageons à être attentif lorsque vous quittez notre site web et à lire les déclarations de confidentialité de chaque site web susceptible de collecter des informations personnelles.
            <br><span class="fontplus">Sécurité de l'information</span>
            <br>Nous sécurisons les informations que vous fournissez sur des serveurs informatiques dans un environnement contrôlé et sécurisé, protégé contre tout accès, utilisation ou divulgation non autorisés. Nous conservons des garanties administratives, techniques et physiques raisonnables pour nous protéger contre tout accès, utilisation, modification et divulgation non autorisés des données personnelles sous son contrôle et sa garde. Toutefois, aucune transmission de données sur Internet ou sur un réseau sans fil ne peut être garantie.
            <br><span class="fontplus">Divulgation légale</span>
            <br>Nous divulguerons toute information que nous collectons, utilisons ou recevons si la loi l'exige ou l'autorise, par exemple pour nous conformer à une citation à comparaître ou à une procédure judiciaire similaire, et lorsque nous pensons de bonne foi que la divulgation est nécessaire pour protéger nos droits, votre sécurité ou celle d'autrui, enquêter sur une fraude ou répondre à une demande du gouvernement.
            <br><span class="fontplus">Informations de contact</span>
            Si vous souhaitez nous contacter pour comprendre davantage la présente politique ou si vous souhaitez nous contacter concernant toute question relative aux droits individuels et à vos informations personnelles, vous pouvez envoyer un courriel à hello@weigu-app.com.
        </p>
        <h2 id="mentions_légales" class="cover-heading pb-3">Mentions légales</h2>
        <p>
            <br><span class="fontplus">Publication du site</span>
            <br>Le présent site www.weigu-app.com est édité par The Happiness Project, dont le siège est situé 183,Cours de l'Yser 33800 BORDEAUX.
            Hébergeur : OVH SAS - 2 rue Kellermann - 59100 Roubaix - France
            <br><span class="fontplus">Réalisation</span>
            Steve Kana
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
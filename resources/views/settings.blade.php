<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <title>Home</title>
  <link href="{{ route('dashboard.exprimer') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/weigu.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body class="d-flex flex-column josefin">
  <div class="grey-bg scroll">
    <div class=" my-container">
      <div class="page-top">
        <div class="page-title">
          <a href="{{ URL::previous() }}"><i class="bi bi-chevron-left"></i></a>
          <h2>Paramètres</h2>
        </div>
      </div>
      <div class="page-middle d-flex flex-column">
        <div class="setting-section">
          <h2 class="setingtitle">Compte</h2>
          <a href="#" class="setting-button">
            <h2>Changer le mot de passe</h2><i class="bi bi-chevron-right"></i>
          </a>
          <a href="#" class="setting-button brdt">
            <h2>Mon solde</h2><i class="bi bi-chevron-right"></i>
          </a>
        </div>
        <div class="setting-section">
          <h2 class="setingtitle">Notifications</h2>
          <p>selectionez vos préférences par type de notification <a href="#">En savoir plus</a></p>
          <a href="{{ route('dashboard.settings.preferences') }}" class="setting-button brdt">
            <h2>Préférences</h2><i class="bi bi-chevron-right"></i>
          </a>
        </div>
        <div class="setting-section">
          <h2 class="setingtitle">Others</h2>
          <a href="/privacy" class="setting-button">
            <h2>Privacy Policy</h2><i class="bi bi-chevron-right"></i>
          </a>
          <a href="/terms-and-conditions" class="setting-button brdt">
            <h2>Terms & Conditions</h2><i class="bi bi-chevron-right"></i>
          </a>
          <div class="setting-button logout-button brdt">
            {{-- make it functional :D --}}
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <h2>Déconnexion</h2>
            </a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

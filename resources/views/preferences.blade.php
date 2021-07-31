<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <title>Home</title>
  <link href="{{asset('css/weigu.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body class=" d-flex flex-column">
  <div class="grey-bg scroll">
    <div class="my-container">
      <div class="page-top">
        <div class="page-title">
          <a href="{{ URL::previous() }}"><i class="bi bi-chevron-left"></i></a>
          <h2>Préférences</h2>
        </div>
      </div>
      <div class="page-middle">
        <div class="setting-section">
          <p class="bg-clr m-0">selectionez vos préférences par type de notification <a href="#">En savoir plus</a> </p>
          <a class="setting-button" data-toggle="collapse" href="#collapse1" role="button" aria-expanded="false" aria-controls="collapseExample1">
            <h2>Notifications push</h2><i class="bi bi-chevron-right"></i>
          </a>
        </div>
        <div class="collapse bg-clr" id="collapse1">
          <div class="button-nd">
            <h3 class="button-name m-0">Notifications push</h3>
            <div class="myswitch">
              <input type="checkbox" id="toggle1" />
              <label for="toggle1"></label>
            </div>
          </div>
          <div class="button-ndw">
            <h3 class="button-name  m-0">Nouveau message privé</h3>
            <label class="containercb">
              <input id="checkbox1" type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="button-ndw">
            <h3 class="button-name  m-0">Nouvel anonyme</h3>
            <label class="containercb">
              <input id="checkbox2" type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="button-ndw">
            <h3 class="button-name  m-0">Lorem Upsum</h3>
            <label class="containercb">
              <input id="checkbox3" type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
        <div class="setting-section">
          <a class="setting-button brdt" data-toggle="collapse" href="#collapse2" role="button" aria-expanded="false" aria-controls="collapseExample2">
            <h2>Notification par mail</h2><i class="bi bi-chevron-right"></i>
          </a>
        </div>
        <div class="collapse bg-clr" id="collapse2">
          <div class="button-nd">
            <h3 class="button-name m-0">Notifications push</h3>
            <div class="myswitch">
              <input type="checkbox" id="toggle2" />
              <label for="toggle2"></label>
            </div>
          </div>
          <div class="button-ndw">
            <h3 class="button-name  m-0">Nouveau message privé</h3>
            <label class="containercb">
              <input id="checkbox1" type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="button-ndw">
            <h3 class="button-name  m-0">Nouvel anonyme</h3>
            <label class="containercb">
              <input id="checkbox2" type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
          <div class="button-ndw">
            <h3 class="button-name  m-0">Lorem Upsum</h3>
            <label class="containercb">
              <input id="checkbox3" type="checkbox">
              <span class="checkmark"></span>
            </label>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

</html>

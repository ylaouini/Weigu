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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

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
          <h2 class="setingtitle">Préférences</h2>
        </div>
        <!-- ============================================================== -->
        <div class="setting-section">
          <a class="setting-button brdt">
            <h2>Notification par mail</h2></i>
          </a>
        </div>
        <div class="">
          <div class="button-nd">
            <h3 class="button-name m-0">Nouvelles questions reçues</h3>
            <div class="myswitch">
              <input class="question" type="checkbox" id="toggle1" @if(\Illuminate\Support\Facades\Auth::user()->notify_me_question == 1) checked @endif/>
              <label for="toggle1"></label>
            </div>
          </div>
        </div>
        <div class="">
          <div class="button-nd">
            <h3 class="button-name m-0">Messages non lus</h3>
            <div class="myswitch">
              <input class="message" type="checkbox" id="toggle2" @if(\Illuminate\Support\Facades\Auth::user()->notify_me_message == 1) checked @endif/>
              <label for="toggle2"></label>
            </div>
          </div>
        </div>

          <!-- ============================================================== -->

        <div class="setting-section">
          <h2 class="setingtitle">Others</h2>
          <a href="/privacy" class="setting-button">
            <h2>Privacy Policy</h2><i class="bi bi-chevron-right"></i>
          </a>
          <a href="/terms-and-conditions" class="setting-button brdt">
            <h2>Terms & Conditions</h2><i class="bi bi-chevron-right"></i>
          </a>
          <div class="setting-button logout-button brdt">
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
<script>
    $(function() {
        $('.message').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = {{\Illuminate\Support\Facades\Auth::id()}};

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/settingsChangeMessage',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })

        $('.question').change(function() {
            var status = $(this).prop('checked') == true ? 1 : 0;
            var user_id = {{\Illuminate\Support\Facades\Auth::id()}};

            $.ajax({
                type: "GET",
                dataType: "json",
                url: '/settingsChangeQuestion',
                data: {'status': status, 'user_id': user_id},
                success: function(data){
                    console.log(data.success)
                }
            });
        })
    })

</script>
</html>

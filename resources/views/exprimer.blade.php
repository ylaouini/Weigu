<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Home</title>
    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/animate.css') }}" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/wow/0.1.12/wow.min.js"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="d-flex flex-column justify-content-between josefin josefin">
<div class="grey-bg scroll">
    <div class="my-container">
        <h1 class="pagelogo">Weigu</h1>
        <div class="exprimer page-middle pt-3">

            <div class="pl-4 pr-4 col-lg-12 d-flex flex-column bd-highlight mb-3">

                <div class="d-flex flex-column">
                    <img class="ghost" src="{{ asset('/images/icons/Black/ghost.png') }}" alt="">
                    <p class="parag">
                        Pose tes questions, anonymement à toute la communauté
                        <br>
                        <a href="#">en savoir plus</a>
                    </p>
                </div>
                <div class="d-flex flex-row">
                    <div class="d-flex flex-column notif-expr">
                        <img class="" src="{{ asset('/images/icons/Black/woman.png') }}" alt="">
                        <p class="notif-parag">
                            <a href="#">^<span id="totalUsers">{{ $totalUsers }}</span>&nbsp;&nbsp;utilisateurs</a>
                        </p>
                    </div>
                    <div class="d-flex flex-column notif-expr">
                        <img class="" src="{{ asset('/images/icons/Black/question.png') }}" alt="">
                        <p class="notif-parag">
                            <a href="#">^<span id="totalQuestions">{{ $totalQuestions }}</span>&nbsp;&nbsp;questions</a>
                        </p>
                    </div>
                    <div class="d-flex flex-column notif-expr">
                        <img class="" src="{{ asset('/images/icons/Black/messages.png') }}" alt="">
                        <p class="notif-parag">
                            <a href="#">^<span id="totalResponses">{{$totalResponses}}</span>&nbsp;&nbsp;réponses</a>
                        </p>
                    </div>
                </div>
                <div>
                    <input type="hidden" name="type" value="1" />
                    <div class="d-flex sendsection justify-content-between">
                        <span class="cancel">Annuler</span>
                        <button onclick="paperplane()">
                            <img id="send" src="{{ asset('/images/icons/Grey/send.png') }}" alt="">
                        </button>
                    </div>
                    <div class="exprm-write dspl fill-the-rest mt-2 mb-4">
                        <div class="writedmessage">
                            <textarea id="story" name="message" rows="5" cols="33" placeholder="Pose une question" onkeyup="plumtosend()"></textarea>
                            <img src="{{asset('/storage/avatars/'.auth()->user()->avatar)}}" alt="">
                        </div>
                    </div>
                </div>
                <div id="notif" class="span3 wow fadeInRight" data-wow-duration="2s">
                    <div class="notification-section mt-4 pt-2 pb-2 pl-4 pr-4">
                        <img src="https://randomuser.me/api/portraits/men/14.jpg" alt="">
                        <div class="notification-content">
                            <div class="notification-sender">
                                <h5>Nicolas Martin</h5>
                                <p class="time">1s</p>
                            </div>
                            <p class="notification">Hello la coummun, j'aurais utiliser</p>
                        </div>
                    </div>
                    <div class="notiftime">
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="send_it hideit d-flex page-middle pt-3">
            <img src="{{ URL::asset('images/gifs/letter.gif') }}" alt="">
        </div>
        <div class="bottle d-flex flex-column hideit page-middle pt-3">
            <p>Steve, ton message a désormais été envoyé,<br>Tu seras notifié dès que obtiendras tes premières réponses.
            </p>
            <img src="{{ URL::asset('images/gifs/letterbottle.gif') }}" alt="">
        </div>
    </div>
</div>
@include('partials._navbar')
</body>

<script>
    function plumtosend() {
        if ($("#story").val() != "") {
            $(".cancel").addClass("toblue");
            $("#send").attr('src', "{{ asset('/images/icons/Blue/send.png') }}").fadeIn(1200);
        } else {
            $(".cancel").removeClass("toblue");
            $("#send").attr('src', "{{ asset('/images/icons/Grey/send.png') }}").fadeIn(1200);
        }
    };

    $(document).ready(function() {
        $(".tab-bar.expr .tabbi1").addClass("hideit");
        $(".tab-bar.expr .tabbi2").removeClass("hideit");
    });

    function notif() {
        setTimeout(function() {
            $("#notif").removeClass("fadeInRight");
            $("#notif").addClass("fadeOutRight");
        }, 3200);
        new WOW().init();
        $("#notif").removeClass("fadeOutRight");
        setTimeout(function() {
            $("#notif").addClass("hideit");
        }, 3000);
    }
    notif();

    function paperplane() {
        let msgData = new FormData();
        msgData.append("_token", "{{ csrf_token() }}");
        msgData.append("type", 1);
        msgData.append("message", $("#story").val());
        $.ajax({
            method: "POST",
            processData: false,
            contentType: false,
            dataType: "JSON",
            url: "{{ Route('dashboard.exprimer.add') }}",
            data: msgData,
        });
        $(".exprimer").addClass("hideit");
        $(".send_it").removeClass("hideit");
        setTimeout(function() {
            $(".send_it").addClass("hideit");
            $(".bottle").removeClass("hideit");
        }, 1700);
        setTimeout(function() {
            location.reload();
        }, 5700);

    }

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    //var pusher = new Pusher('610ae87cdd570ec71c9c', {
    var pusher = new Pusher('610ae87cdd570ec71c9c', {
        cluster: 'eu'
    });

    var channel = pusher.subscribe('count-changed');

    channel.bind('TotalUserChanged', function(data) {
        document.getElementById('totalUsers').innerHTML = JSON.parse(data.totalUsers);
    });

    channel.bind('TotalResponsesChanged', function(data) {
        document.getElementById('totalResponses').innerHTML = JSON.parse(data.totalResponses);
    });

    channel.bind('TotalQuestionChanged', function(data) {
        document.getElementById('totalQuestions').innerHTML = JSON.parse(data.totalQuestions);
    });
</script>


</html>

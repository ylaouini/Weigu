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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
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
                    <button onclick="deletecontent()">
                        <span class="cancel">Annuler</span>
                    </button>
                            <button onclick="paperplane()">
                            <img id="send" src="{{ asset('/images/icons/Grey/send.png') }}" alt="">
                        </button>
                    </div>
                    <div class="exprm-write dspl fill-the-rest mt-2 mb-4">
                        <div class="writedmessage">
                            <textarea id="story" name="message" rows="5" cols="33" placeholder="Pose une question" onkeyup="plumtosend()"></textarea>
                            <img src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.auth()->user()->avatar) }}" alt="">
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="send_it hideit d-flex page-middle pt-3">
            <img src="{{ URL::asset('images/gifs/letter.gif') }}" alt="">
        </div>
        <div class="bottle d-flex flex-column hideit page-middle pt-3">
            <p>{{auth()->user()->name}}, ton message a désormais été envoyé,<br>Tu seras notifié dès que obtiendras tes premières réponses.
            </p>
            <img src="{{ URL::asset('images/gifs/letterbottle.gif') }}" alt="">
        </div>
    </div>

</div>
@include('partials._navbar')
</body>



<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
<script>
    // Create an instance of Notyf
    var notyf = new Notyf();


    // // Display an error notification
    // notyf.error('You must fill out the form before moving forward');
    //
    // // Display a success notification
    // notyf.success('Your changes have been successfully saved!');

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

    function deletecontent(){
        $("#story").val("");
    }
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

    // // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;
    //
    // //var pusher = new Pusher('610ae87cdd570ec71c9c', {
    // var pusher = new Pusher('610ae87cdd570ec71c9c', {
    //     cluster: 'eu'
    // });
    //
    // var channel = pusher.subscribe('count-changed');
    //
    // channel.bind('TotalUserChanged', function(data) {
    //     document.getElementById('totalUsers').innerHTML = JSON.parse(data.totalUsers);
    // });
    //
    // channel.bind('TotalResponsesChanged', function(data) {
    //     document.getElementById('totalResponses').innerHTML = JSON.parse(data.totalResponses);
    // });
    //
    // channel.bind('TotalQuestionChanged', function(data) {
    //     document.getElementById('totalQuestions').innerHTML = JSON.parse(data.totalQuestions);
    // });
</script>

<!-- @if (session()->has('message'))
    <script type="text/javascript">

        document.addEventListener("DOMContentLoaded", function () {

            var message = '{{ session('message') }}';
            var type = '{{ session('notyfType') }}';
            // warning,danger,success,default
            var duration = 9500;
            var ripple = true;
            var dismissible = true;
            // var positionX = document.querySelector("input[name=\"notyf-position-x\"]:checked").value;
            // var positionY = document.querySelector("input[name=\"notyf-position-y\"]:checked").value;
            window.notyf.open({
                type,
                message,
                duration,
                ripple,
                dismissible,
            });
        });
    </script>
@endif -->
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    //var pusher = new Pusher('610ae87cdd570ec71c9c', {
    var pusher = new Pusher('610ae87cdd570ec71c9c', {
        cluster: 'eu'
    });
    var current_user_id = {{ Auth::id() }};
    var channel = pusher.subscribe('count-changed');


    channel.bind('TotalUserChanged', function(data) {
        document.getElementById('totalUsers').innerHTML = JSON.parse(data.totalUsers);

        var message ='Nouvelle inscription de: '+ data.userName;
        var type = 'success';
        // warning,danger,success,default
        var duration = 9500;
        var ripple = true;
        var dismissible = true;
        // var positionX = 'right';
        // var positionY = 'top';
        window.notyf.open({
            type,
            message,
            duration,
            ripple,
            dismissible,
            position: {
                x: 'right',
                y: 'top',
            },
        });

    });

    channel.bind('TotalResponsesChanged', function(data) {
        document.getElementById('totalResponses').innerHTML = JSON.parse(data.totalResponses);
    });

    channel.bind('TotalQuestionChanged', function(data) {

        document.getElementById('totalQuestions').innerHTML = JSON.parse(data.totalQuestions);
        // document.getElementById('messageWow').innerHTML = data.message;
        // document.getElementById('userWow').innerHTML = data.name;

        var message ='Ano: '+ data.message;
        var type = 'success';
        // warning,danger,success,default
        var duration = 9500;
        var ripple = true;
        var dismissible = true;
        // var positionX = 'right';
        // var positionY = 'top';
        window.notyf.open({
            type,
            message,
            duration,
            ripple,
            dismissible,
            icon : false,
            position: {
                x: 'right',
                y: 'top',
            },
        });
    });

    var channel = pusher.subscribe('user-{{ Auth::id() }}');
    channel.bind('TotalNotificationChanged', function(data) {
        document.getElementById('notification').innerHTML = JSON.parse(data.totalNotifications);
        document.getElementById('notificationJavascript').classList.remove('hideit');
        document.getElementById('notificationServer').classList.add('hideit');
    });
</script>
</html>

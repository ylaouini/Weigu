<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <title>Home</title>
    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body class="d-flex flex-column justify-content-between josefin">
<div class="grey-bg scroll">
    <div class="my-container">
        <div class="page-top">
            <div class="page-title">
                <a href="#"><i class="bi bi-chevron-left"></i></a>
                <h2>Notifications</h2>
            </div>
        </div>
        <div class="page-middle">
            <div class="pt-3">

                @foreach($questions as $question)
                    <div class="notification-section pt-2 pb-2 pl-4 pr-4">
                        <img src="https://randomuser.me/api/portraits/women/26.jpg" alt="">
                        <div class="notification-content">


                                    <div class="notification-sender">
                                        <h5>{{$question->user->name}}</h5>
                                        <p class="time">{{$question->created_at}}</p>
                                    </div>

                                    <p class="notification">a  message :</p>
                                    <p class="notification">{{$question->message}}</p>
                            @if(\App\Models\ChMessage::where('broadcast_message_id',$question->id)->where('to_id',auth()->id())->exists())
                                Received<br>
                            @else
                                <a  href="{{route('sendQuestion',$question->id)}}">ok</a>
                            @endif

                            @if($question->user_id == auth()->id())
                                my question<br>
                            @endif

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@include('partials._navbar')
</body>
<script>
    $(document).ready(function () {
        $(".tab-bar.notif .tabbi1").addClass("hideit");
        $(".tab-bar.notif .tabbi2").removeClass("hideit");
    });
</script>

</html>



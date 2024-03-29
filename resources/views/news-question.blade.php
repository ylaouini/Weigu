<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <title>Home</title>
    <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="d-flex flex-column justify-content-between josefin">
<div class="grey-bg scroll">
    <div class="my-container">
        <div class="page-top withoutborder">
            <div class="page-title">
                <h2 class="mylogo">Weigu</h2>
                <a href="{{ route('dashboard.settings') }}"><i class="bi tabbi1 bi bi-gear"></i></a>
                <div class="navigatebuttons d-flex justify-content-between">
                    <div class="navigatebutton nav-tab1 active">
                        <a href="#">Home</a>
                    </div>
                    <!-- <div class="navigatebutton nav-tab2">
                        <a href="#">Associations</a>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="page-middle home-tab1 dspl">
            <div class="pt-3">
                <div class="scrolling-pagination" id="post-data">

                    @include('data')

                    {{--                        <div class="notification-section pt-2 pb-2 pl-4 pr-4">--}}
                    {{--                            <div class="notification-content">--}}
                    {{--                                <div class="notification-sender">--}}
                    {{--                                    <img src="{{ asset('/images/icons/Black/unknown.png') }}" alt="">--}}
                    {{--                                    --}}{{--                                                                                <h5>{{$question->user->name}}</h5>--}}
                    {{--                                    --}}{{--                                                                                <p class="time">{{$question->created_at}}</p>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    --}}{{--                                                                                <p class="notification msg">{{$question->message}}</p>--}}
                    {{--                                </div>--}}
                    {{--                            @if(\App\Models\ChMessage::where('broadcast_message_id',$question->id)->where('to_id',auth()->id())->exists())--}}
                    {{--                                <!-- Received<br> -->--}}
                    {{--                            @else--}}

                    {{--                                <!-- <a href="{{route('sendQuestion',$question->id)}}">ok</a> -->--}}
                    {{--                                @endif--}}
                    {{--                                @if($question->user_id == auth()->id())--}}
                    {{--                                    my question<br>--}}
                    {{--                                @endif--}}
                    {{--                            </div>--}}
                    {{--                            <div class="myicons">--}}
                    {{--                                <a href="#"><i class="bi bi-chevron-right"></i></a>--}}
                    {{--                                <i class="bi bi-eye"></i>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}

                </div>
                <div class="ajax-load text-center" style="display:none">
                    <p>Load More Post...</p>
                </div>
                {{--                {{ $questions->links() }}--}}
            </div>
        </div>
        <!-- <div class="page-middle home-tab2">
            2eme page sur le menu de navigation
        </div> -->
    </div>
</div>
@include('partials._navbar')

</body>
<script>

    $(document).ready(function () {
        $(".tab-bar.home .tabbi1").addClass("hideit");
        $(".tab-bar.home .tabbi2").removeClass("hideit");
    });

    $(".nav-tab1").click(function () {
        $(".nav-tab1").addClass("active");
        $(".nav-tab2").removeClass("active");
        $(".home-tab1").addClass("dspl");
        $(".home-tab2").removeClass("dspl");
    });

    $(".nav-tab2").click(function () {
        $(".nav-tab2").addClass("active");
        $(".nav-tab1").removeClass("active");
        $(".home-tab2").addClass("dspl");
        $(".home-tab1").removeClass("dspl");
    });

</script>

<script>
    function loadMoreData(page) {
        $.ajax({
            url: '?page=' + page,
            type: 'get',
            beforeSend: function () {
                $(".ajax-load").show();
            }
        })
            .done(function (data) {
                if (data.html == "") {
                    $('.ajax-load').html("Il n'y a plus d'autres questions!");
                    return;
                }
                $('.ajax-load').hide();
                $("#post-data").append(data.html);
            })
            // Call back function
            .fail(function (jqXHR, ajaxOptions, thrownError) {
                alert("Server not responding.....");
            });
    }

    var page = 1;
    $(".grey-bg").scroll(function () {
        // console.log( $(".my-container").height() )
        console.log($(".grey-bg").scrollTop() + $(".grey-bg").height() +1 +'>='+ $(".my-container").height())
        if ($(".grey-bg").scrollTop() + $(".grey-bg").height() + 1 >= $(".my-container").height()) {
            page++;
            loadMoreData(page);
        }
    });

    // function findScroller(element) {
    //     element.onscroll = function() { console.log(element)}
    //
    //     Array.from(element.children).forEach(findScroller);
    // }
    //
    // findScroller(document.body);
</script>

</html>

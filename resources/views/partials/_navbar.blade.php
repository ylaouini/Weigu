<div class="myfooter tab-box">
    <div class="d-flex justify-content-between">
        <div class="tab-bar expr">
            <a href="{{ route('dashboard.exprimer') }}"><i class="bi tabbi1 bi-plus-square"></i></a>
            <a href="{{ route('dashboard.exprimer') }}"><i class="bi tabbi2 bi-plus-square-fill  hideit"></i></a>
        </div>
        <div class="tab-bar chatpage">
            <a href="{{ route('chat') }}"><i class="bi tabbi1 bi-envelope"></i>@if($countUnseenMessages != 0)<div class="notifier">
                    <p>{{$countUnseenMessages}}</p>
                </div>@endif</a>
            <a href="{{ route('chat') }}"><i class="bi tabbi2 bi-envelope-fill  hideit"></i></a>
        </div>

                <div class="tab-bar profil">
                    <a href="{{ route('dashboard.settings') }}"><i class="bi tabbi1 bi bi-gear"></i></a>
                    <a href="{{ route('dashboard.settings') }}"><i class="bi tabbi2 bi bi-gear-fill hideit"></i></a>
                </div>
{{--        <div class="tab-bar notif">--}}
{{--            <a href="{{ route('dashboard.notifications') }}"><i class="bi tabbi1 tabbi1 bi-bell"></i>@if($totalNotification != 0)--}}
{{--                    <div class="notifier"><p id="notificationServer">{{$totalNotification}}</p>--}}
{{--                </div>@endif--}}

{{--                <div id="notificationJavascript" class="notifier hideit">--}}
{{--                    <p id="notification"></p>--}}
{{--                </div>--}}

{{--            </a>--}}
{{--            <a href="{{ route('dashboard.notifications') }}"><i class="bi tabbi2 bi-bell-fill  hideit"></i></a>--}}
{{--        </div>--}}
{{--        <div class="tab-bar profil">--}}
{{--            <a href="{{ route('dashboard.profile') }}"><i class="bi tabbi1 bi-person"></i></a>--}}
{{--            <a href="{{ route('dashboard.profile') }}"><i class="bi tabbi2 bi-person-fill hideit"></i></a>--}}
{{--        </div>--}}
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    //var pusher = new Pusher('610ae87cdd570ec71c9c', {
    var pusher = new Pusher('67f29f74b854da3938e2', {
        cluster: 'eu'
    });
    var current_user_id = {{ Auth::id() }};
    var channel = pusher.subscribe('count-changed');


    channel.bind('TotalUserChanged', function(data) {
        document.getElementById('totalUsers').innerHTML = JSON.parse(data.totalUsers);
    });

    channel.bind('TotalResponsesChanged', function(data) {
        document.getElementById('totalResponses').innerHTML = JSON.parse(data.totalResponses);
    });

    channel.bind('TotalQuestionChanged', function(data) {

        document.getElementById('totalQuestions').innerHTML = JSON.parse(data.totalQuestions);
        // document.getElementById('messageWow').innerHTML = data.message;
        document.getElementById('userWow').innerHTML = data.name;
    });

    var channel = pusher.subscribe('user-{{ Auth::id() }}');
    channel.bind('TotalNotificationChanged', function(data) {
            document.getElementById('notification').innerHTML = JSON.parse(data.totalNotifications);
            document.getElementById('notificationJavascript').classList.remove('hideit');
            document.getElementById('notificationServer').classList.add('hideit');
    });
</script>

@extends('layouts.root')
@section('content')

<div class="cont s--signup">
    <div class="form sign-in">
        <div class="signupform">
            <i id="toconnect" class="bi bi-chevron-left hideitdesktop"></i>
            <h5 class="rejoindre"><span class="pagelogo hideitdesktop">Weigu</span></h5>
            {{-- <form id="registerForm" method="POST" action="{{ route('register') }}" class="formcontent">--}}
            <form id="registerForm" class="formcontent">
                <h5 class="rejoins">Rejoins-nous !</h5>
                @csrf
                {{-- <div class="group">--}}
                {{-- <input type="text" name="name" class="my-inputs" name="name" value="" autocomplete="name"--}}
                {{-- autofocus required>--}}
                {{-- <span class="highlight"></span>--}}
                {{-- <span class="bar"></span>--}}
                {{-- <label>Nom d’utilisateur</label>--}}
                {{-- </div>--}}
                <input type="hidden" value="Anonyme" name="name" />
                <input type="text" name="email" :value="old('email')" class="my-inputs" required placeholder="Email" autocomplete="email">
                {{-- <div class="group">--}}
                {{-- <input type="password" name="password" class="my-inputs" id="password" required--}}
                {{-- autocomplete="new-password">--}}
                {{-- <span class="highlight"></span>--}}
                {{-- <span class="bar"></span>--}}
                {{-- <label>Mot de passe</label>--}}
                {{-- </div>--}}
                <div class="group-radio">
                    <label class="sexe">Sexe</label>
                    <div class="radio_group">
                        <input class="myradio" type="radio" name="gender" title="Femme" value="1" checked="" required="" style="margin-top: 7px;">
                        <label class="" for="flexRadioDefault1" style="text-align: left;">
                            Homme
                        </label>
                    </div>
                    <div class="radio_group">
                        <input class="myradio" type="radio" name="gender" title="Homme" value="0" required style="margin-top: 7px;">
                        <label class="" for="flexRadioDefault2" style="text-align: left">
                            Femme
                        </label>
                    </div>
                </div>
                <div class="dategroup">
                    <label>Anniversaire</label>
                    <div class="select-date">

                        <div class="date-div">
                            <select class="form-control" id="select-year" name='birth_year' placeholder="Année"></select>
                        </div>
                        <div class="date-div">
                            <select class="form-control" id="select-month" name='birth_month' placeholder="Mois">
                                <option value="1">Janvier
                                <option value="2">Février
                                <option value="3">Mars
                                <option value="4">Avril
                                <option value="5">Mai
                                <option value="6">Juin
                                <option value="7">Juillet
                                <option value="8">Août
                                <option value="9">Septembre
                                <option value="10">Octobre
                                <option value="11">Novembre
                                <option value="12">Décembre
                            </select>
                        </div>
                        <div class="date-div">
                            <select class="form-control" id="select-day" name='birth_day' placeholder="Jour"></select>
                        </div>
                    </div>
                </div>
                {{-- <div class="skill-group">--}}
                {{-- <label class="label_skill">Quel est ton super pouvoir ?</label>--}}
                {{-- <label class="skill_label">Je suis un :</label>--}}
                {{-- <input type="text" name="superPower" class="skill-text" placeholder="" value="" required>--}}
                {{-- </div>--}}
                <ul id="register-errors" class="invalid-feedback" role="alert"></ul>

                <ul id="register-errors" class="invalid-feedback" role="alert"></ul>
                <button type="submit" id="terminer" class="my-buttons mt-4">
                    Terminer
                </button>
            </form>
            <a href="{{route('login.twitter')}}" type="submit" id="connect" class="btn btn-primary mt-4">
                Connexion with Twitter
            </a>
            <footer class="footer" style="font-size: smaller;">
                @yield('footer', view('partials._footer'))
            </footer>
        </div>
    </div>
    <div class="sub-cont">
        <div class="img hideitmobile">
            <div class="img__text m--up">
            </div>
            <div class="img__text m--in">
            </div>
            <div class="img__btn">
                <span class="m--up">Se connecter</span>
                <span class="m--in">S'inscrire</span>
            </div>
        </div>
        <div class="form sign-up">
            <div class="signform">
                <div class="d-flex flex-column topst">
                    <div class="slider_image hideitdesktop">
                        <img src="{{ asset('/images/homeimgem.jpg') }}" alt="weigu">
                        <div class="img__btn">
                            <span class="m--in">S'inscrire</span>
                        </div>
                    </div>
                    <!-- <h1 class="pagelogo hideitmobile">Weigu</h1> -->
                    {{-- <div class="avatar">--}}
                    {{-- <p>Parle avec un(e)&nbsp;</p>--}}
                    {{-- <p id="word">&nbsp;</p>--}}
                    {{-- </div>--}}
                    <div class="description">
                        Et si on faisait les choses autrement ? <br>
                        Initie des discussions<span> en posant des questions</span>.<br>Sur Weigu, tu trouveras toujours quelqu’un à qui parler.
                    </div>
                    {{-- <form method="POST" action="{{ route('login') }}" class="formcontent">--}}
                    <form method="POST" action="{{ route('login') }}" id="emailForm" class="formcontent">
                        @csrf
                        <input class="my-inputs" id="email" class="block mt-1 w-full" type="text" name="email" placeholder="Email" :value="old('email')" required autofocus>
                        {{-- <div id="pwd" class="group hideit">--}}
                        {{-- <input type="password" name="password" class="my-inputs" id="passwordInput" required>--}}
                        {{-- <span class="highlight"></span>--}}
                        {{-- <span class="bar"></span>--}}
                        {{-- <label>Mot de passe</label>--}}
                        {{-- </div>--}}
                        <input type="hidden" value="password" name="password" />
                        <input type="checkbox" class="form-checkbox" name="remember" hidden checked>


                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{-- <button type="button" id="next" class="my-buttons mt-4">--}}
                        {{-- Suivant--}}
                        {{-- </button>--}}
                        <button type="submit" id="connect" class="my-buttons mt-4">
                            Connexion
                        </button>
                    </form>
                    <x-jet-validation-errors class="mb-4" />
                    {{-- <button class="magic_link hideit" type="submit" id="byMagicLink">--}}
                    {{-- Recevoir un lien de connexion--}}
                    {{-- </button>--}}
                </div>
                {{-- <div class="link_sended hideit">--}}
                {{-- Un lien de connexion vous a été envoyé par mail--}}
                {{-- </div>--}}
                <footer class="footer" style="font-size: smaller;">
                    @yield('footer', view('partials._footer'))
                </footer>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script>
    var daysInMonth = [31, 29, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31],
        today = new Date(),
        // default targetDate is christmas
        targetDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

    setDate(targetDate);
    setYears(50) // set the precedent years in dropdown

    $("#select-month").change(function() {
        var monthIndex = $("#select-month").val();
        setDays(monthIndex);
    });

    function setDate(date) {
        setDays(date.getMonth());
        $("#select-day").val(date.getDate());
        $("#select-month").val(date.getMonth() + 1);
        $("#select-year").val(date.getFullYear());
    }

    // make sure the number of days correspond with the selected month
    function setDays(monthIndex) {
        var optionCount = $('#select-day option').length,
            daysCount = daysInMonth[monthIndex-1];



        if (optionCount < daysCount) {
            for (var i = optionCount; i < daysCount; i++) {
                $('#select-day')
                    .append($("<option></option>")
                        .attr("value", i + 1)
                        .text(i + 1));
            }
        } else {
            for (var i = daysCount; i < optionCount; i++) {
                var optionItem = '#select-day option[value=' + (i + 1) + ']';
                $(optionItem).remove();
            }
        }
    }

    function setYears(val) {
        var year = today.getFullYear();
        for (var i = 13; i < val; i++) {
            $('#select-year')
                .append($("<option></option>")
                    .attr("value", year - i)
                    .text(year - i));
        }
    }

    $('input[type=radio][name=gender]').on('change', function() {
        switch ($(this).val()) {
            case '1':
                $(".skill_label").html("Je suis un :");
                break;
            case '0':
                $(".skill_label").html("Je suis une :");
                break;
        }
    });


    $(".img__btn").click(function() {
        $(".cont").toggleClass("s--signup");
        $("nav.navbar").toggleClass("hideitmobile");
        $(".nav-right li a").toggleClass("towhite");
    });
    $("#toconnect").click(function() {
        $(".cont").toggleClass("s--signup");
        setTimeout(function() {
            $("nav.navbar").toggleClass("hideitmobile");
        }, 1000);
    });

    //Repl
    //Replace Text function
    // Array of words
    // var words = ['Polytechnicien', 'Rappeur', 'Geek', 'Coach de vie', 'Entrepreneur', 'Styliste', 'Astronaute', 'Fille', 'Roux', 'Poète', 'Peintre', 'Licorne', 'Ninja', 'Crèative', 'Danseuse'];
    // var randomNumber;
    // var randomNumber1;
    // // Function that executes every 2000 milliseconds
    // var t = setInterval(function () {
    //     // Random number generator
    //     do {
    //         randomNumber = Math.round(Math.random() * (words.length - 1));
    //         // Change the word in the span for a random one in the array of words
    //     } while (randomNumber == randomNumber1);
    //     randomNumber1 = randomNumber;
    //     $('#word').html(words[randomNumber]);
    // }, 400);
    //End Replace Text function

    $("#next").click(function() {
        $("#byMagicLink").removeClass("hideit");
        $("#connect").removeClass("hideit");
        $("#pwd").removeClass("hideit");
        $("#next").addClass("hideit");
    });



    // {{--let currentStep = 0;--}}
    // {{--let emailData = null;--}}
    // {{--// on next click check if email exists--}}
    // {{--$('#emailForm').submit(function(e) {--}}
    // {{--    e.preventDefault();--}}
    // {{--    emailData = $(this).serializeArray();--}}
    // {{--    $.ajax({--}}
    // {{--        method: "POST",--}}
    // {{--        headers: {--}}
    // {{--            Accept: "application/json"--}}
    // {{--        },--}}
    // {{--        url: "{{ route('check-email') }}",--}}
    // {{--        data: emailData,--}}
    // {{--        success: () => {--}}
    // {{--            // currentStep += 1;--}}
    // {{--            // $("#modalBackBtn").css({--}}
    // {{--            //     display: "inline-block"--}}
    // {{--            // });--}}
    // {{--            // $("#loginTypeModalBody").css({--}}
    // {{--            //     display: "block"--}}
    // {{--            // });--}}
    // {{--            // $("#emailModalBody").css({--}}
    // {{--            //     display: "none"--}}
    // {{--            // });--}}
    // {{--        },--}}
    // {{--        error: (response) => {--}}
    // {{--            if (response.status === 422) {--}}
    // {{--                alert('not exist')--}}
    // {{--                let errors = response.responseJSON.errors;--}}
    // {{--                Object.keys(errors).forEach(function(key) {--}}
    // {{--                    $("#" + key + "Input").addClass("is-invalid");--}}
    // {{--                    $("#" + key + "Error").children("strong").text(errors[key][0]);--}}
    // {{--                });--}}
    // {{--            } else {--}}
    // {{--                window.location.reload();--}}
    // {{--            }--}}
    // {{--        }--}}
    // {{--    });--}}
    // {{--});--}}

    // {{--$('#byMagicLink').click(function (e) {--}}

    // {{--    if ($("#emailInput").val() == "") {--}}
    // {{--        return;--}}
    // {{--    }--}}

    // {{--    currentStep += 1--}}
    // {{--    $.ajax({--}}
    // {{--        method: "POST",--}}
    // {{--        headers: {--}}
    // {{--            Accept: "application/json"--}}
    // {{--        },--}}
    // {{--        url: "{{ route('magic-link') }}",--}}
    // {{--        data: emailData,--}}
    // {{--        beforeSend: () => {--}}

    // {{--        },--}}
    // {{--        success: () => {--}}

    // {{--        },--}}
    // {{--        error: () => {--}}

    // {{--        }--}}
    // {{--    })--}}
    // {{--});--}}

    $('#registerForm').submit(function(e) {
        e.preventDefault();
        $('#register-errors').empty()
        const userData = $(this).serializeArray();

        userData.push({
            'name': 'birth_date',
            'value': userData[4].value + '/' + userData[5].value + '/' + userData[6].value
        });

        $.ajax({
            type: 'POST',
            headers: {
                Accept: "application/json"
            },
            url: '/register',
            data: userData,
            beforeSend: () => {
                $('.register-save span.save').hide();
                $('.register-save span.spinner-border').show();
            },
            success: () => {
                window.location.href = '/login/confirm'
            },
            error: (response) => {
                if (response.status == 422) {
                    $('#register-errors').css({
                        display: 'block'
                    })
                    let errors = response.responseJSON.errors;
                    Object.keys(errors).forEach(function(key) {
                        $("#register-errors").append(`<li class='error-item'>${errors[key][0]}</li>`);
                    });
                } else {
                    alert(response.status)
                    window.location.reload();
                }
                $('.register-save span.save').show();
                $('.register-save span.spinner-border').hide();
            }
        });
    });
</script>
@endsection

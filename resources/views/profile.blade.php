<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <link href="{{ asset('css/weigu.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

</head>

<body class="d-flex flex-column justify-content-between josefin">

<div class="grey-bg scroll">
  <div class="my-container page-middle p-0">
    <div class="body-section profil flex-fill">


      <div class="gutters-sm col-md-12">
        <a href="#" class="setting"><i class="bi bi-gear"></i></a>
        <a role="button" class="edit" data-toggle="modal" data-target="#registerModal"><i class="bi bi-pencil"></i></a>

        <div id="registerModal" class="modal fade elements profil" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered modal-md register-modal">
            <div class="modal-content">
              <div class="modal-header border-1">
                <h5 class="modal-title" id="staticBackdropLiveLabel">Editer le profil</h5>
                <button type="button" data-dismiss="modal" class="close" aria-label="Close">
                <i class="bi bi-x-lg"></i>
                </button>
              </div>
              <div class="container p-4">
                <div class="row">
                  <div class="col-sm-12 col-md-12 editprofil">
                    <form id="registerForm" method="POST" action="{{ route('register') }}">
                      @csrf
                      <div class="mb-3">
                        <div class="profil d-flex flex-column align-items-center text-center">
                          <div class="up-pic mb-4">
                            <img id="profil-pic" src="https://randomuser.me/api/portraits/men/17.jpg" alt="Admin" class="rounded-circle" width="150">
                            <a href="#" class="upload">
                              <input id="upfile" accept="image/*" type="file" value="upload" onchange="loadFile(event)" />
                              <i class="bi bi-camera-fill"></i>
                            </a>
                          </div>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label textstart">Modifiez votre nom</label>
                        <input type="text" name="name" class="form-control p-4" name="name" placeholder="Votre nom" value="Jhon Williams" autocomplete="name" autofocus required>
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label textstart">Renseigner un lien ?</label>
                        <input type="link" name="instagram_link" class="form-control p-4" placeholder="Renseigner un lien" value="www.instagram.com/Jhonwill" required autocomplete="link">
                      </div>


                      <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label textstart">Modifiez votre bio (320 caractères Max.)</label>
                        <textarea name="bio" class="form-control mb-0 " id="bio" placeholder="" required rows="3"></textarea>
                      </div>
                      <ul id="register-errors" class="invalid-feedback" role="alert"></ul>
                      <div class="text-center">
                        <button class="btn btn-dark" type="submit" style="border-radius: 20px; width:100%">
                          <span class="save">Sauvegarder</span>
                          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none"></span>
                        </button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="p-0">
          <div class="p-4">
            <div class="profil-section d-flex flex-column align-items-center text-center">
              <!-- <h2 class="mb-3">Mon Profile</h2> -->
              <img src="https://randomuser.me/api/portraits/men/17.jpg" alt="Admin" class="rounded-circle" width="150">
              <div class="mt-3">
                <h4>John Williams</h4>
                <p class="text-secondary mb-1">Etudiant à Sup de Co</p>
                <p class="text-secondary mb-1">Qui m'a envoyé dans cette école ?</p>
                <div class="instagramlink mb-3"><a href="http://www.instagram.com/Jhonwill"><i class="bi bi-link-45deg"></i>instagram.com/Jhonwill</a></div>
                <h5 class="msg-nbr">245</h5>
                <p class="text-secondary mb-1  mb-3">Réponse</p>
                <button class="btn btn-outline-primary">Message</button>
                <button class="btn btn-outline-primary"><img class="sharelove" src="{{ asset('/images/icons/Blue/give.png') }}" alt=""></button>
              </div>
            </div>
          </div>
        </div>
      </div>
{{--      <div class="messages-box flex-fill col-md-7 p-0">--}}
{{--        <div class="tabbar pl-4 pt-2">--}}
{{--          <div class="d-flex">--}}
{{--            <div class="tab tab1 active col-md-4 p-0">--}}
{{--              <h5>Mes favoris</h5>--}}
{{--            </div>--}}
{{--            <div class="tab tab2 col-md-4 p-0">--}}
{{--              <h5> </h5>--}}
{{--            </div>--}}
{{--            <div class="tab tab2 col-md-4 p-0">--}}
{{--              <h5> </h5>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

{{--        <!-- ---------------tab1-------------- -->--}}
{{--        <div class="tab-content fill tab1 active">--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/83.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/4.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/3.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/3.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/25.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/9.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

{{--        <!-- ---------------tab2-------------- -->--}}
{{--        <!-- <div class="tab-content fill tab2 pl-4 pr-4">--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/73.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Maxim loren</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/11.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/13.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/14.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/13.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/13.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/15.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/19.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div> -->--}}
{{--        <!-- ---------------tab3-------------- -->--}}
{{--        <!-- <div class="tab-content fill tab3 pl-4 pr-4">--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/63.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Marco jhon</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/10.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/31.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/41.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/35.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/36.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/men/21.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="pt-2 pb-2 pl-4 pr-4">--}}
{{--            <img src="https://randomuser.me/api/portraits/women/91.jpg" alt="">--}}
{{--            <div class="msg">--}}
{{--              <h5 class="name">Happy Bones</h5>--}}
{{--              <p class="content text-truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>--}}
{{--              <i class="bi bi-bookmark-fill"></i>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div> -->--}}
{{--      </div>--}}

    </div>
  </div>
</div>

{{--  @include('partials._navbar')--}}
</body>


<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function() {
      $(".tab-bar.profil .tabbi1").addClass("hideit");
      $(".tab-bar.profil .tabbi2").removeClass("hideit");
    });
  $(".tab1").click(function() {
    $(".tab1").addClass("active");
    $(".tab2").removeClass("active");
    $(".tab3").removeClass("active");
  });
  $(".tab2").click(function() {
    $(".tab2").addClass("active");
    $(".tab1").removeClass("active");
    $(".tab3").removeClass("active");
  });
  $(".tab3").click(function() {
    $(".tab3").addClass("active");
    $(".tab2").removeClass("active");
    $(".tab1").removeClass("active");
  });

  $("a.upload").click(function() {
    document.getElementById("upfile").click();
  });

  var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
      var output = document.getElementById('profil-pic');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
<script src="{{ asset('js/app.js') }}"></script>
</html>

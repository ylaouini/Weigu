@component('mail::message')
<h1 style="text-align: center">C'est reparti !!! 🎉</h1><br>
<div style="text-align: center">
Hello {{$name}}, on espère que tu vas bien <3<br>
Tu nous a probablement connu grâce à Twitter ;)<br>
Nous avons fait le ménage sur le site internet, On espère que le résultat te plaira<br>
</div>
<br>
<div style="text-align: center">
    <img  src="https://media.giphy.com/media/3oKIPCSX4UHmuS41TG/giphy.gif">
</div>

<div style="text-align: center;line-height: 3em">
Nous avons changé plusieurs choses:<br>
1. Goodvibezzz devient Weigu<br>
2. La fonctionnalité "meet" est remplacée par un mode de fonctionnement plus intuitif<br>
Ce qui n'a pas changé en revanche c'est la mission que nous nous sommes fixés :<br>
Nous voulons toujours lutter contre l'isolement moral,<br>
en créant une communauté de personnes bienveillantes qui répondent aux intérrogations les unes des autres.<br>
C'est pourquoi, Weigu devient un réseau social de questions/réponses (Q&A).<br>
Tu peux déjà commencer à poser des questions en te connectant à ton compte :<br>
</div>
<form method="POST" action="{{ route('login') }}" id="emailForm" class="formcontent" style="text-align: center">
    @csrf
    <input id="email" type="text" name="email" value="{{$email}}" hidden>
    <input type="hidden" value="password" name="password" />
    <input type="checkbox" class="form-checkbox" name="remember" hidden checked>
<button type="submit" id="connect" class="button button-primary" style="cursor: pointer;">
    Je me connecte
</button>
</form>

Thanks,<br>
{{ config('app.name') }}
@endcomponent

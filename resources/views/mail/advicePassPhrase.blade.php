@component('mail::message')
# Salut

Voici votre code secret de connexion qui est valable pour les 15 prochaines minutes

<div style="border-left-style: dotted;
    background-color: #f9f9f9;
border-left: thick green;
border-left: 0.5rem solid;
    padding: .75em;">
    {{$passphrase}}
</div>
<br>

Merci d'utiliser notre application!
<br>
<br>
Take heart,<br>
la team {{ config('app.name') }}
@endcomponent

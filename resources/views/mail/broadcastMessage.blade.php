@component('mail::message')
# Salut {{$name}}

Tu as reçu un nouvelle question de {{$sender}}

<div style="border-left-style: dotted;
border-left: thick green;
border-left: 2px solid #edeff1;
    padding: .75em;">
        {{$message}}
</div>
<br>
@component('mail::button', ['url' => $url])
Aller au message
@endcomponent

Merci d'utiliser notre application!
<br>
<br>
Take heart,<br>
la team {{ config('app.name') }}
@endcomponent

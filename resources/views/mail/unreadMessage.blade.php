@component('mail::message')
# Salut {{$name}}

Tu as {{$messageCount}} message(s) non lu

@foreach($messages as $message)
    {{\App\Models\User::find($message->from_id)->name}} | {{$message->body}}
@endforeach

@component('mail::button', ['url' => $url])
Aller au message
@endcomponent
Merci d'utiliser notre application!
<br>
<br>
Take heart,<br>
la team {{ config('app.name') }}
@endcomponent

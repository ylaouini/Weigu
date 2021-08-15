@component('mail::message')
# Salut {{$name}}

Tu as {{$messageCount}} message(s) non lu

@foreach($messages as $message)
<div style="border-left-style: dotted;
border-left: thick green;
border-left: 0.2rem solid #edf2f7;
    padding: .75em;">
        {{\App\Models\User::find($message->from_id)->name}} | {{$message->body}}
</div>

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

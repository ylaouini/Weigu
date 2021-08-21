<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <!-- <x-jet-authentication-card-logo /> -->
            <h1 class="pagelogo">Weigu</h1>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <form method="POST" action="{{ route('login.confirmation') }}">
            @csrf
            <div>
                <label class="checkemail mb-4 text-center" for="passphrase">Nous vous avons envoyé un mail</label>
                <label class="pb-4 text-center">Nous avons envoyé un mail à <span class="mail">{{$userEmail}}</span><br> Il contient un code que vous devrez copier
                    et coller dans la zone de texte ci-dessous 😊</label>
                <input class="my-inputs mt-4" class="" type="text" name="passphrase" placeholder="Passphrase" required autofocus>
            </div>

            <div class="flex items-center justify-center">
                <input type="submit" class="my-buttons" value="CONFIRMER">
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

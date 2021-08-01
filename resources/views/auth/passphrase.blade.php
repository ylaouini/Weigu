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
                <label class="checkemail mb-4 text-center" for="passphrase">Nous vous avons envoyé un lien de confirmation.</label>
                <label class="pb-4 text-center">Nous avons envoyé un e-mail à <span class="mail">stevykana@yahoo.fr</span><br> Il contient un lien qui finalisera votre inscription.</label>
                <div class="group mt-4">
                    <input class="my-inputs" class="" type="text" name="passphrase" required autofocus>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label>Passphrase</label>
                </div>
            </div>

            <div class="flex items-center justify-center mt-4">
                <input type="submit" class="my-buttons" value="CONFIRMER">
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
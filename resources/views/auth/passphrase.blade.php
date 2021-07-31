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
                <x-jet-label class="mb-4" value="Lorem lorem lorem" for="passphrase" />
                <div class="group">
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
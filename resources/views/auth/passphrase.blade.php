<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
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
                <x-jet-label value="Pass-phrase" for="passphrase" />
                <x-jet-input class="block w-full mt-1" type="text" name="passphrase" :value="old('passphrase')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button class="ml-4">
                    Confirm
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>

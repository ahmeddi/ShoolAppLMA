<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4 rllt" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class=" danger text-base font-semibold my-3">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <label for="eid" for="auths" class="labels w-full  flex justify-start font-bold"> Utilisateur: </label>
                <input id="auths" name="auths"  class="mt-1 inputs w-full rounded-md h-10  " type="text"   required autocomplete="current-password" />       
            </div>

            <div class="mt-4">
                <label for="eid" for="password" class="labels w-full flex justify-start font-bold" >Mot de passe:                </label>
                <input id="password" name="password"  class="mt-1 inputs w-full rounded-md h-10  " type="password"   required autocomplete="current-password" />       
            </div>

            <div class="flex  justify-end mt-4">
                <x-button class=" text-md bg-teal-700 hover:bg-teal-900">
                    {{ __('Se connecter') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

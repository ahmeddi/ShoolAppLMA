<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('att.etuds') }}
        </h2>
    </x-slot>

    <div class=" mx-2 mt-4">
         @livewire('attnds-etuds')
         @livewire('attnds-etuds-add') 
    </div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ $etud->nom }}
        </h2>
    </x-slot>

    <div class="">
           @livewire('etuds-comps',['ids' => $etud->id ]) 
    </div>
</x-app-layout>

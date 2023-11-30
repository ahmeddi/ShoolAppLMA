<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold lg:text-xl md:text-xl text-sm text-gray-800 dark:text-gray-100 leading-tight">
            @if (app()->getLocale() == 'ar')
                {{ $etud->nom }}
            @else
                {{ $etud->nomfr }}
            @endif
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden shadow-md p-4 sm:rounded-lg">
                @livewire('etude-profil', ['etud' => $etud]) 
                @livewire('etud-edit')
                @livewire('etud-pic', ['etudId' => $etud->id])
                @livewire('etud-semes') 
                @livewire('etude-del')             
            </div>
        </div>
    </div>
</x-app-layout>

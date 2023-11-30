<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold lg:text-xl md:text-xl text-sm text-gray-800 dark:text-gray-100 leading-tight">
            @if (app()->getLocale() == 'ar')
                {{ $etudiant->nom }}
            @else
                {{ $etudiant->nomfr }}
            @endif
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            @livewire('etud-result', ['etudiant' => $etudiant])
        </div>
    </div>
</x-app-layout>

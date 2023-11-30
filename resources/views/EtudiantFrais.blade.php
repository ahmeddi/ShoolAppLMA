<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $etud->nom }}
        </h2>
    </x-slot>  
    
    <div class="bg-white p-2 rounded shadow m-3 dark:bg-gray-900">
     
        {{-- @livewire('comptetuds-cotisation',['etud' => $etud]) --}}


    </div>


</x-app-layout>
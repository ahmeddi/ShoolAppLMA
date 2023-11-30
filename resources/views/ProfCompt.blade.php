<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $prof->nom }}
        </h2>
    </x-slot>  
    
    <div > 
       @livewire('prof-compt',['ids' => $prof->id])
    </div>


</x-app-layout>
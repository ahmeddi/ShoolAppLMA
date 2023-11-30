<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $prof->nom }}
        </h2>
    </x-slot>  
    
    <div > 
        @livewire('prof-paiements',['ids' => $prof->id])
        @livewire('prof-paiements-add',['ids' => $prof->id])
        @livewire('prof-paiements-edit',['ids' => $prof->id])
       @livewire('prof-paiements-del')
    </div>


</x-app-layout>
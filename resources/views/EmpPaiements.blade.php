<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $emp->nom }}
        </h2>
    </x-slot>  
    
    <div > 
        @livewire('emp-paiements',['ids' => $emp->id])
        @livewire('emp-paiements-add',['ids' => $emp->id])
        @livewire('emp-paiements-edit',['ids' => $emp->id])
        @livewire('emp-paiements-del')
    </div>

</x-app-layout>
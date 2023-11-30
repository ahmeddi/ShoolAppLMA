<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $emp->nom }}
        </h2>
    </x-slot>  
    
    <div > 
            @livewire('emp-remises',['ids' => $emp->id])
            @livewire('emp-remises-add',['ids' => $emp->id])
            @livewire('emp-remises-edit',['ids' => $emp->id])
            @livewire('emp-remises-del') 
    </div>

</x-app-layout>
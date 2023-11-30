<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $emp->nom }}
        </h2>
    </x-slot>  
    
    <div > 
            @livewire('emp-hons',['emp' => $emp->id])
            @livewire('emp-hons-add',['ids' => $emp->id])
            @livewire('emp-hons-edit',['ids' => $emp->id])
            @livewire('emp-hons-del')
    </div>
</div>


</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ $prof->nom }}
        </h2>
    </x-slot>  
    
    <div > 
            @livewire('prof-hons',['prof' => $prof->id])
            @livewire('prof-hons-add',['ids' => $prof->id])
            @livewire('prof-hons-edit',['ids' => $prof->id])
            @livewire('prof-hons-del')
    </div>
</div>


</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           {{ app()->getLocale() == 'ar' ? $data->nom : $data->nomfr }}
        </h2>
    </x-slot>  
    
    <div class=" p-2 m-3 ">
     
        @livewire('parent-frais',['ids' => $data->id]) 
        @livewire('parent-frais-add',['ids' => $data->id]) 

        @livewire('parent-frais-edit',['ids' => $data->id]) 
        @livewire('parent-frais-del')




    </div>


</x-app-layout>
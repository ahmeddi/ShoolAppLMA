<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ app()->getLocale() == 'ar' ? $data->nom : $data->nomfr }}
        </h2>
    </x-slot>  
    
    <div class=" p-2 m-3 ">
     
        @livewire('parent-remises',['ids' => $data->id]) 
        @livewire('parent-remises-add',['ids' => $data->id]) 
        @livewire('parent-remises-edit',['ids' => $data->id]) 
        @livewire('parent-remises-del')




    </div>


</x-app-layout>
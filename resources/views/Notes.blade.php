<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('notes.notes') }}
        </h2>
    </x-slot>

    <div class=" bg-white shadow-md p-3 dark:bg-gray-900 rounded-md mx-2 mt-4">
         @livewire('notes')
        @livewire('note-add') 
        @livewire('note-edit')  
        @livewire('note-del')  



    </div>


</x-app-layout>
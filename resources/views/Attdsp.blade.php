<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('att.profs') }}
        </h2>
    </x-slot>
    
    <div class=" p-3 mx-2 mt-4">
        @livewire('attnds-profs')
        @livewire('attnds-profs-add') 
        @livewire('attnds-profs-edit') 
        @livewire('attnds-profs-del') 

    </div>


</x-app-layout>
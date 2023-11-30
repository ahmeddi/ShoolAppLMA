<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('att.sja') }} - {{ $prof->nom }}  
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden shadow-md p-4 sm:rounded-lg">
                 @livewire('emp-att-list', ['emp' => $prof])
                 @livewire('emp-att-list-add', ['emp' => $prof->id]) 
                 @livewire('emp-att-list-edit',)         
                 @livewire('emp-att-list-del')      
            </div>
        </div>
    </div>
</x-app-layout>
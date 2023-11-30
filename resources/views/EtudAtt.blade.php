<x-app-layout>
    <x-slot name="header">

        <h2 class="capitalize font-semibold lg:text-xl md:text-xl text-sm text-gray-800 dark:text-gray-100 leading-tight">
            @if (app()->getLocale() == 'ar')
            {{ __('att.sj') }} - {{ $etud->nom }}  
            @else
            {{ __('att.sj') }} - {{ $etud->nomfr }}  
            @endif
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden shadow-md p-4 sm:rounded-lg">
                 @livewire('etud-att-list', ['etud' => $etud])
                 @livewire('etud-att-list-add', ['etud' => $etud->id]) 
                 @livewire('etud-att-list-edit',)         
                 @livewire('etud-att-list-del')       
            </div>
        </div>
    </div>
</x-app-layout>
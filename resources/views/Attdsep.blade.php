<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('att.emps') }}
        </h2>
    </x-slot>

    <div class=" p-3 mx-2 mt-4">
        @livewire('attnds-emps')
        @livewire('attnds-emps-add') 
    </div>


</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('navlink.comps') }}
        </h2>
    </x-slot>

    <div class=" ">
         @livewire('comps')
    </div>
</x-app-layout>
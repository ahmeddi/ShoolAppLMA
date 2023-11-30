<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('result.result') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto px-2 ">
            <div class="flex flex-col space-y-2 my-2 bg-white dark:bg-gray-900 overflow-hidden rounded-md px-1 py-4 ">
                    @livewire('result-add') 
            </div>
        </div>
        
    </div>
</x-app-layout>
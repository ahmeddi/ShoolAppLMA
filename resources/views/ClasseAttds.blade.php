<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto px-4">
            <div>
                @livewire('classe-attds')
                @livewire('classe-attds-add')
            </div>
        </div>
    </div>

</x-app-layout>
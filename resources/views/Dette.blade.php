<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 m-2">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden px-4 sm:rounded-lg">
               <div> @livewire('dettes-eches', ['dette' => $dette])   </div>
        </div>

</x-app-layout>
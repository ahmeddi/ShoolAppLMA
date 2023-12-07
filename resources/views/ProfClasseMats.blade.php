<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
           
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden shadow-md p-4 sm:rounded-lg">

                @livewire('prof-classe-mats',['ids' => $ids->id])
                @livewire('prof-classe-mats-add',['ids' => $ids->id])
                @livewire('prof-classe-mats-edit',['ids' => $ids->id])
                @livewire('prof-classe-ma-del',['ids' => $ids->id])
                 
            </div>
        </div>
    </div>

</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('mats.mats') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2  p-4 ">

                 <div> @livewire('matts')   </div> 
                 <div> @livewire('matt-add')   </div>
                 <div> @livewire('matt-edit')   </div> 
                 <div> @livewire('matt-del')   </div> 



            </div>
        </div>
    </div>
</x-app-layout>
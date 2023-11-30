<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('classe.classes') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 m-2  overflow-hidden">

                 <div> @livewire('classes')   </div> 
                 <div> @livewire('class-add')   </div> 
                 <div> @livewire('class-edit')   </div> 
                 <div> @livewire('class-del')   </div>  
                    
            </div>
        </div>
    </div>
</x-app-layout>
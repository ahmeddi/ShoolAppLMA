<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('navlink.parametres') }}
        </h2>
    </x-slot>

    <div class="py-2 print:py-0 ">
        <div class="max-w-7xl mx-2 p-2">
               @livewire('parametres')
              {{--  @livewire('parametres-logo')--}}
               @livewire('parametres-head') 
               @livewire('time-add') 
                @livewire('time-edit')
                @livewire('time-del')

        </div>
    </div>
</x-app-layout>
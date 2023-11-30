<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight print:hidden">
             {{ __('jorns.soir') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 print:shadow-none overflow-hidden shadow-md p-4 sm:rounded-lg">

                  @livewire('calandar-soir',['clas' => $clas])
                  @livewire('calandar-soir-add',['clas' => $clas])
                  @livewire('calandar-soir-del',['clas' => $clas])

            </div>
    </div>
</x-app-layout>
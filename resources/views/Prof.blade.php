<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ $prof->nom }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl px-2 mx-auto ">
            <div class="flex flex-col space-y-2 overflow-hidden bg-white dark:bg-gray-800 shadow-md  sm:rounded-lg">
                @livewire('prof-profil', ['prof' => $prof])
                @livewire('prof-edit')
                @livewire('prof-del')
                @livewire('prof-pic', ['profId' => $prof->id])
            </div>
        </div>
    </div>
</x-app-layout>
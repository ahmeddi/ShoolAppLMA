<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
           {{ $nom }}
        </h2>
    </x-slot>

    <div class="py-2 space-y-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-2">
            @livewire('depenses-ents',['ids' => $ids])
            @livewire('depenses-ents-add',['ent' => $ids])
            @livewire('depenses-ents-edit')
            @livewire('depenses-ents-del')             
        </div>
    </div>

</x-app-layout>


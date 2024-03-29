<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold lg:text-xl md:text-xl text-sm text-gray-800 dark:text-gray-100 leading-tight">
            @if (app()->getLocale() == 'ar')
                {{ $Parent->nom }}
            @else
                {{ $Parent->nomfr }}
            @endif
        </h2>
    </x-slot>

    <div class="py-2 w-full ">
        <div class="w-full ">
            <div class="flex flex-col space-y-2  overflow-hidden sm:rounded-lg">
                <div> @livewire('parent-profil',[ 'Parent' => $Parent ]) </div>
                <div> @livewire('etud-par-add',[ 'prId' => $Parent->id ]) </div> 
                <div> @livewire('parent-edit') </div> 
            </div>
        </div>
    </div>
</x-app-layout>

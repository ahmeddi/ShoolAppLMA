<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{-- {{$Parent->nom }} --}}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl m-2 lg:m-6">
            @livewire('parents-dettes')
        </div>
    </div>
</x-app-layout>

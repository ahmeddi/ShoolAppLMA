<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
            {{ $group->nom }}
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="">
            <div class="flex flex-col  space-y-2 overflow-hidden sm:rounded-lg">
                @livewire('whatsapp-groups-edit', ['group' => $group])
            </div>
        </div>
    </div>
</x-app-layout>
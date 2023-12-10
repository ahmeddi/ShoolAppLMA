<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('classe.recom') }}
        </h2>
    </x-slot>

    <div class="py-2 print:py-0 ">
        @livewire('classe-recomadations',
         [
         'etuds' => $lists,
         'sem' => $sem,
         ])
    </div>
</x-app-layout>
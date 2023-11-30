<x-app-layout>
    <x-slot name="header">
        <h2 class="capitalize font-semibold text-lg text-gray-800  dark:text-gray-100 leading-tight">
            {{ __('notes.notes') }} - {{ app()->getLocale() == 'ar' ? $etud->nom : $etud->nomfr }} 
        </h2>
    </x-slot>

    <div class=" bg-white shadow-md p-3 dark:bg-gray-900 rounded-md mx-2 mt-4">
        @livewire('etud-note-list', ['etud' => $etud])
        @livewire('etud-note-list-add', ['etud' => $etud->id])
        @livewire('etud-note-list-edit')
        @livewire('etud-note-list-del')
        @livewire('etud-note-list-viw') 
    </div>


</x-app-layout>
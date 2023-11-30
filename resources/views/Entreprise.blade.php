<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ $entreprise->nom }}
        </h2>
    </x-slot>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4 m-2">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden shadow-md px-4 sm:rounded-lg">
                <div> @livewire('entreprise', ['entreprise' => $entreprise])   </div>
                <div> @livewire('entreprise-edit')   </div>
               <div> @livewire('entreprise-del')   </div>
               
        </div>

        <div x-data="{ activeTab: 1 }" class="my-2">
            <!-- Tab Buttons -->
            <ul class="flex ">
                <li
                    x-on:click="activeTab = 1"
                    :class="{ 'border-teal-500 dark:border-teal-400 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-50 font-bold': activeTab === 1 }"
                    class="cursor-pointer px-4 py-2 -mb-px border-l border-t border-r rounded-t-lg dark:text-gray-300 text-gray-800 dark:border-0"
                >
                {{ __('ent.prets') }} / {{ __('ent.dons') }}
                </li>
                <li
                    x-on:click="activeTab = 2"
                    :class="{ 'border-teal-500 dark:border-teal-400 bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-50 font-bold': activeTab === 2 }"
                    class="cursor-pointer px-4 py-2 -mb-px border-l border-t border-r rounded-t-lg dark:text-gray-300 text-gray-800 dark:border-0"
                >
                {{ __('ent.versements') }}
                </li>
            </ul>
            
            <!-- Tab Content -->
            <div class="p-4  bg-white dark:bg-gray-800">

                <!-- prets Content -->
                <div x-show="activeTab === 1">
                    <div> @livewire('dettes', ['entreprise_id' => $entreprise->id])   </div>
                    <div> @livewire('dettes-add', ['entreprise_id' => $entreprise->id])   </div>
                    <div> @livewire('dettes-edit')   </div>
                    <div> @livewire('dettes-del')   </div>
                </div>

                <!-- versements Content -->
                <div x-show="activeTab === 2" >
                    <div> @livewire('dettes-peiments', ['entreprise_id' => $entreprise->id])   </div>
                    <div> @livewire('dettes-peiments-add', ['entreprise_id' => $entreprise->id])   </div>
                    <div> @livewire('dettes-peiments-edit')   </div>
                    <div> @livewire('dettes-peiments-del')   </div>
                </div>
            </div>
        </div>

</x-app-layout>
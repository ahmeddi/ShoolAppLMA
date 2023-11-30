<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('result.result') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class=" px-8 my-2">
            <div class="flex w-full  justify-between ">
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow-md rounded-lg text-left overflow-hidde w-72 ">
                    <div class=" p-4">
                        <div class="flex justify-center">
                            <div class="text-center ">
                                <h3 class="text-base leading-6 font-medium text-gray-500 dark:text-gray-100">{{ __('result.class') }}</h3>
                                <p class="text-lg font-bold text-gray-800 dark:text-gray-50">{{ $classe->nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow-md rounded-lg text-left overflow-hidden  w-72  ">
                    <div class=" p-4">
                        <div class="flex justify-center">
                            <div class="text-center ">
                                <h3 class="text-base leading-6 font-medium text-gray-500 dark:text-gray-100">{{ __('result.mat') }}</h3>
                                <p class="text-lg font-bold text-gray-800 dark:text-gray-50">{{ $mat_nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow-md rounded-lg text-left overflow-hidden  w-72  ">
                    <div class=" p-4">
                        <div class="flex justify-center">
                            <div class="text-center ">
                                <h3 class="text-base leading-6 font-medium text-gray-500 dark:text-gray-100">{{ $sem_nom }}</h3>
                                <p class="text-lg font-bold text-gray-800 dark:text-gray-50">{{ $dev_nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 bg-white dark:bg-gray-900 overflow-hidden shadow-md p-4 sm:rounded-lg">
                 <div> @livewire('etud-notes',[            
                    'classe' => $classe,
                    'mat' => $mat,
                    'dev' => $dev,]) 
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
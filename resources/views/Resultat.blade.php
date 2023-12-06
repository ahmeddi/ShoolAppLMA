<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('result.result') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class=" px-8 my-2 w-full">
            <div class="flex flex-col lg:flex-row space-y-2 justify-between items-baseline">
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow-md rounded-lg text-left overflow-hidde mx-2 lg:w-72 w-full lg:h-full ">
                   <div class="px-4 py-4 lg:py-2 w-full">
                        <div class="flex justify-center w-full">
                            <div class="w-full flex sm:flex-row md:flex-row lg:flex-col justify-start items-center lg:justify-center">
                                <h3 class="mx-3 text-base leading-6 font-medium text-gray-500 dark:text-gray-100">{{ __('result.class') }} :</h3>
                                <p class="text-lg font-bold text-gray-800 dark:text-gray-50">{{ $classe->nom }}</p>
                            </div>
                        </div>                        
                    </div>
                </div>
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow-md rounded-lg text-left overflow-hidden  mx-2  lg:w-72 w-full lg:h-full  ">
                   <div class="px-4 py-4 lg:py-2 w-full">
                        <div class="flex justify-center w-full">
                            <div class="w-full flex sm:flex-row md:flex-row lg:flex-col justify-start items-center lg:justify-center">
                                <h3 class="mx-3 text-base leading-6 font-medium text-gray-500 dark:text-gray-100">{{ __('result.mat') }} :</h3>
                                <p class="text-lg font-bold text-gray-800 dark:text-gray-50">{{ $mat_nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center bg-white dark:bg-gray-800 shadow-md rounded-lg text-left overflow-hidden mx-2  lg:w-72 w-full lg:h-full  ">
                    <div class="px-4 py-4 lg:py-2 w-full">
                        <div class="flex justify-center w-full">
                            <div class="w-full flex sm:flex-row md:flex-row lg:flex-col justify-start items-center lg:justify-center">
                                <h3 class="mx-3 text-base leading-6 font-medium text-gray-500 dark:text-gray-100">{{ $sem_nom }} :</h3>
                                <p class="text-lg font-bold text-gray-800 dark:text-gray-50">{{ $dev_nom }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-4 bg-white dark:bg-gray-800 overflow-hidden rounded-md ">
            <div class="flex flex-col space-y-2 shadow-md p-4">
                 <div> @livewire('etud-notes',[            
                    'classe' => $classe,
                    'mat' => $mat,
                    'dev' => $dev,]) 
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
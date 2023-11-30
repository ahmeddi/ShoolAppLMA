<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight print:hidden">
            
        </h2>
    </x-slot>

    <div class="py-2 ">
        <section class="">
            <div class="py-8 px-4 lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm text-center">
                    <h1 class="mb-4 text-7xl tracking-tight font-extrabold lg:text-9xl text-teal-600 dark:text-teal-300">404</h1>
                    <p class="mb-4 text-3xl tracking-tight font-bold text-gray-900 md:text-4xl dark:text-white">{{ __('err.err1') }}</p>
                    <p class="mb-4 text-lg font-medium text-gray-800 dark:text-gray-100">{{ __('err.err2') }} </p>

                    <div class=" flex  justify-center w-full">
                        <button wire:naviagte @click="history.back()"
                        class="px-4 mx-3 inline py-3 w-40 text-sm text-center font-medium leading-5 shadow text-white transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-green bg-teal-600 active:bg-teal-600 hover:bg-teal-700">
                            {{ __('err.err4') }}----
                        </button>
                        <a href="{{url(app()->getLocale().'/dashboard')}}"  class="px-4 mx-3 inline py-3 w-40 text-center text-sm font-medium leading-5 shadow text-teal-600 transition-colors duration-150 border border-transparent rounded-lg focus:outline-none focus:shadow-outline-green ring-1 ring-teal-600 bg-white active:bg-teal-50 hover:bg-teal-50">
                            {{ __('err.err3') }}
                        </a >
                    </div>
                </div>   
            </div>
        </section>
    </div>
</x-app-layout>
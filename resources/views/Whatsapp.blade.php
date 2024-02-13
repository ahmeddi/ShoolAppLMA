<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-100">
            {{ __('Whatsapp') }}
        </h2>
    </x-slot>

    <div class="p-4">
        <div class="">
            <div class=" w-full flex justify-end">
                <div class=" flex mx-8 my-2 items-center">
                    <div>
                        <a class="  hover:underline" wire:navigate.hover href="{{url(app()->getLocale().'/Whatsapp/Groups') }}">
                            {{ __('whats.group') }}
                        </a>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 rotate-180">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>                  
                    </div>
                </div>
                
            </div>
            <div class="flex flex-col  space-y-2 overflow-hidden sm:rounded-lg">
                @livewire('whatsapp')
            </div>
        </div>
    </div>
</x-app-layout>
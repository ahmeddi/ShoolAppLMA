<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('jorns.jorns') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2  overflow-hidden  p-4 my-4">
                <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-lg shadow-md overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-900  ">
                    <tr >
                        <th scope="col" class="px-6 py-3 text-right font-bold text-sm tracking-tight  text-gray-600 dark:text-gray-300 uppercase ">
                             {{ __('jorns.class') }}
                        </th>
                        <th scope="col" class="  px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        </th>
                        <th scope="col" class="  px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        </th>
                        <th scope="col" class="  px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        </th>
                    </tr>
                    </thead>
                    <tbody class=" divide-y divide-gray-200 dark:divide-gray-600">
                
                            @foreach ($Classs as $Class)
                                <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-2 flex space-x-2 ">
                                                <div class="flex flex-col">
                                                    <a wire:navigate.hover href="{{url(app()->getLocale().'/Classe'.'/'.$Class->id) }}"  class="h-full w-full hover:underline">
                                                        <div class="text-sm font-bold text-gray-800 dark:text-gray-200">
                                                            {{ $Class->nom   }} 
                                                        </div>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <a wire:navigate.hover href="{{ route('Jorn',$Class->id) }}"  class="h-full w-full">
                                                <div style="direction:ltr" class="text-right font-bold text-sm text-teal-600 dark:text-teal-200">
                                                     {{ __('jorns.emploi') }}
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-2 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <a wire:navigate.hover href="{{ route('Classlist',$Class->id) }}"  class="h-full w-full">
                                                <div style="direction:ltr" class="text-right font-bold text-sm text-teal-600 dark:text-teal-200">
                                                     {{ __('jorns.list') }}
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
              
                    </tbody>
                </table>
            </div>
    </div>
</x-app-layout>
<div class="w-full h-full px-2  ">
    <div class= "flex justify-between mb-2">
        <button wire:click="$dispatch('classadd')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
            {{ __('classe.classes-add') }}
        </button>      
    </div>

    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-lg shadow-md overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-900  ">
        <tr >
            <th scope="col" class="px-6 py-3  rtl:text-right ltr:text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('classe.class-nom') }}
            </th>
            <th>

            </th>


        </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
                @foreach ($Classs as $Class)
                    <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-2 flex space-x-2 ">
                                    <div class="flex flex-col">
                                        <a wire:navigate.hover  href="{{url(app()->getLocale().'/Classe'.'/'.$Class->id) }}" class="h-full w-full font-semibold hover:underline">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                                {{ $Class->nom   }} 
                                       </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </td>
                        
                        <td class="flex space-x-2 py-2 h-full items-center">
                            <div>
                                @can('admin')
                                    <button wire:click="$dispatch('dlt',{ id: {{ $Class->id }} })" class=" stroke-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-600 dark:stroke-red-400 w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                                                               
                                    </button>
                                @endcan
                                
                            </div>                                
                        </td>
                    </tr>
                @endforeach
  
        </tbody>
    </table>   
</div>
<div class="w-full h-full px-2  ">
    <div class= "flex justify-between mb-4">
        <button wire:click="$dispatch('add')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
            {{ __('compt.addn') }}
        </button>
    </div>

    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 shadow-md  rounded-lg overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-900  ">
        <tr >
            <th scope="col" class="px-6 py-3 rtl:text-right ltr:text-left  text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                {{ __('compt.deps') }}
            </th>
            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                
            </th>

        </tr>
        </thead>
        <tbody class=" divide-y divide-gray-200 dark:divide-gray-600">
    
                @foreach ($Deps as $Dep)
                    <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-2 flex space-x-2 ">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-100">
                                            <span class=""> </span>
                                            <a  class="  hover:underline" wire:navigate.hover  href="{{url(app()->getLocale().'/Depense/'.$Dep->id) }}"
                                             >
                                                 {{ $Dep->nom   }} 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="flex space-x-2 py-2 h-full items-center">
                            <div class="mx-4">
                                <button  wire:click="$dispatch('edit',{ id: {{ $Dep->id }} })"  >
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" stroke-teal-700 dark:stroke-teal-300 w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>                                                                               
                                </button>
                            </div>    
                            <div>
                                <button wire:click="$dispatch('dlt',{ id: {{ $Dep->id }} })"  class=" stroke-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-600 dark:stroke-red-400 w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                                                               
                                </button>
                            </div>                                
                        </td>
                    </tr>
                @endforeach
  
        </tbody>
    </table>

   
</div>
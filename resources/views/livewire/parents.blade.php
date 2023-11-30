<div class="w-full h-full px-2 ">
    <div class= "flex justify-between mb-3">
            @can('dir')
                <button wire:click="$dispatch('open')" class='focus:outline-none px-4 py-1 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                    + {{ __('parent.add') }}
                </button>
            @endcan
        
        

        <div class="relative w-80 ">
            <div class=" absolute top-2.5 left-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input wire:model.live="search" id="find" class="inputs rounded-md h-10 w-full pl-8" type="text" name="find"  />   
        </div>
    </div>


    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100  dark:bg-gray-800 w-full">
            <tr class="w-full " >
                <th scope="col" class="ltr:text-left rtl:text-right px-12 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('etudiants.etud') }}
                </th>
                <th scope="col" class="px-6 py-3 rllt  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('parent.Tel') }} /  {{ __('parent.whats') }}
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
    @foreach ($parents as $parent)
        <tr @class(['h-4','w-full','text-center','bg-red-500/20' => $parent->list, 'dark:bg-red-900/30' => $parent->list])  >
            <td class="px-6 py-3 w-1/2 whitespace-nowrap">
                <div class="flex items-center w-full">
                    <div class="flex-shrink-0 h-10 w-10 mx-4 text-gray-300 dark:text-gray-600 rounded-full overflow-hidden">
                        @if ($parent->image)
                            <img  class=" object-cover h-full w-full" src="{{ asset('storage'.'/'.$parent->image) }}" />
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>    
                        @endif
                    </div>
                    <div class="ml-2 flex space-x-2 ">

                        <div class="flex flex-col rllt">
                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                <span class=""> </span>
                                <a wire:navigate.hover href="{{url(app()->getLocale().'/Parent'.'/'.$parent->id) }}" class=" hover:underline" >
                                    {{ $parent->nom }} 
                                </a>
                            </div>
                            <div class="text-sm text-gray-500">
                                <span class="text-sm font-semibold font-ar ">
                                    <strong class="capitalize text-gray-400 dark:text-gray-300 flex justify-end"></strong>
                                </span>
                                <span ></span>
                                <span class="font-ar capitalize">{{ $parent->nomfr  }} </span>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div   class="rtl:text-right ltr:text-left text-sm text-gray-800 dark:text-gray-300"> {{  chunk_split($parent->telephone, 2, ' ')  }}</div>
                <div   class="rtl:text-right ltr:text-left text-sm text-green-600 dark:text-green-300 font-semibold "> {{  chunk_split($parent->whatsapp, 2, ' ')  }}</div>
            </td>
            
        </tr>
    @endforeach
  
        </tbody>
    </table>
  <div class="mt-2"> {{ $parents->links() }}</div>
   
 </div>



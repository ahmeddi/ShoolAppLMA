<div class="w-full h-full  ">
    <div class= "flex justify-between mb-3">
            @can('dir_or_comps')
                <button wire:click="$dispatch('groupadd')" class='focus:outline-none px-4 py-1 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                    + {{ __('whats.group-add') }}
                </button>
            @endcan
        
        <div class="relative lg:w-80 w-52 ">
            <div class=" absolute top-2.5 left-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input wire:model.live="search" id="find" class="inputs rounded-md h-10 w-full pl-8" type="text" name="find"  />   
        </div>
    </div>


    <div class="overflow-x-auto">
        <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-800 w-full">
                <tr class="w-full">
                    <th scope="col" class="ltr:text-left rtl:text-right px-4 md:px-12 py-3 text-xs md:text-sm font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('whats.group') }}
                    </th>
                   
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
                @foreach ($groups as $group)
                    <tr class=" h-4 w-full text-center" >
                        <td class="px-8  py-3 whitespace-nowrap text-gray-900 dark:text-gray-300 text-xs md:text-sm font-medium rllt">
                            <a wire:navigate.hover href="{{ url(app()->getLocale().'/Whatsapp/Group'.'/'.$group->id) }}" class="hover:underline capitalize">
                                {{ $group->nom  }}
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">{{ $groups->links() }}</div>
    
   
 </div>



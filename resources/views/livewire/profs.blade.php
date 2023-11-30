<div class="w-full h-full px-2 ">
    <div class= "flex justify-between mb-3">
            @can('dir')
                <button wire:click="$dispatchTo('prof-add','open')" class='focus:outline-none px-4 py-1 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                    {{ __('prof.add') }}
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

    <table class="w-full  table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100  dark:bg-gray-800 w-full">
            <tr class="w-full ">
                <th scope="col" class="px-6 py-3 rtl:text-right ltr:text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('prof.nom') }}
                </th>
                <th scope="col" class="px-6 py-3  rtl:text-right ltr:text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('prof.tel') }}
                </th>
                <th scope="col" class="px-6 py-3  rtl:text-right ltr:text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('prof.nni') }}
                </th>
                <th scope="col" class="px-6 py-3 rtl:text-right ltr:text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('prof.nc') }}
                </th>
                <th scope="col" class="  px-6 py-3 rtl:text-right ltr:text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    
                </th>


            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
        @foreach ($Profs as $Prof)
            <tr class="">
                <td class="px-6 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 mx-3 h-10 w-10 text-gray-300 dark:text-gray-600 rounded-full overflow-hidden">
                            @if ($Prof->image)
                                <img  class=" object-cover h-full w-full" src="{{ asset('storage'.'/'.$Prof->image) }}" />
                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>    
                            @endif
                        </div>
                        <div class="ml-2 flex space-x-2 ">
                            <div class="flex flex-col">
                                <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                    <span class=""> </span>
                                    <a wire:navigate.hover class=" hover:underline"  href="{{url(app()->getLocale().'/Prof'.'/'.$Prof->id) }}">
                                        {{ $Prof->nom }} 
                                    </a>
                                </div>
                                <div class="text-sm text-gray-500">
                                    <span class="text-sm font-semibold font-ar ">
                                        <strong class="text-gray-400 dark:text-gray-300 flex justify-end"></strong>
                                    </span>
                                    <span ></span>
                                    <span class="font-ar ">{{ $Prof->nomfr }} </span>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </td>
                <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                    <div   class="rtl:text-right ltr:text-left text-sm text-gray-900 dark:text-gray-300"> {{  chunk_split($Prof->tel1, 2, ' ')  }}</div>
                    <div   class="rtl:text-right ltr:text-left text-sm text-gray-900 dark:text-gray-300"> {{  chunk_split($Prof->tel2, 2, ' ')  }}</div>
                </td>
                <td class="rtl:text-right ltr:text-left px-6 py-3 whitespace-nowrap">
                    <div  class="rtl:text-right ltr:text-left text-sm text-gray-900 dark:text-gray-300"> {{ $Prof->nni }}</div>
                </td>
                <td class="px-6 py-3 whitespace-nowrap  text-sm font-medium">
                    <div  class="rtl:text-right ltr:text-left text-sm text-gray-900 dark:text-gray-400"> {{ $Prof->se }}</div>

                </td>
                <td class="px-6 py-3 whitespace-nowrap  text-sm font-medium">
                    <a wire:navigate.hover  href="{{url(app()->getLocale().'/Profs'.'/'.$Prof->id) }}" class="h-full w-full">
                        <div  class="rtl:text-right ltr:text-left font-bold text-sm text-teal-600 dark:text-teal-200"
                                x-data="{ tooltip: false }" 
                                x-on:mouseover="tooltip = true" 
                                x-on:mouseleave="tooltip = false">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                  </svg>                          
                        </div>
                    </a>
                </td>

                
            </tr>
        @endforeach
  
        </tbody>
    </table>
  <div class="mt-2"> {{ $Profs->links() }}</div>
   
</div>



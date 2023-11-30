<div class="w-full h-full px-2  ">
    <div class=" m-2">
        <div  class="flex space-x-8 justify-between  text-center text-gray-500 my-2 ">
            <div class="flex ">
                    <div> <button  @class(['days','daysselceted' => $t_month,])   class="days " wire:click="thisMonth" >{{ __('calandar.month') }}</button></div> 
                    <div> <button  @class(['days','daysselceted' => $p_month,]) class="days" wire:click="pastMonth" > {{ __('calandar.pastM') }} </button> </div>
                    <div> <button  @class(['days','daysselceted' => $t_week,]) class="days " wire:click="thisWeek" >  {{ __('calandar.week') }}</button> </div> 
                    <div> <button  @class(['days','daysselceted' => $all,]) class="days " wire:click="alls" >  {{ __('calandar.tous') }}</button> </div> 

            </div>
            <div class="space-x-3 flex justify-around   ">
                 <input wire:model='day1'  class="h-10 w-54 inputs ml-2" type="date" name="randday"    />
                 <input wire:model='day2'  class="h-10 w-54 inputs ml-2" type="date" name="randday"    />
                <button wire:click='randday' class="relative focus:outline-none bg-teal-500 hover:bg-teal-700 dark:bg-gray-100 dark:hover:bg-gray-200 w-12 h-10 rounded-md">
                            <div class=" absolute top-2.5 left-3.5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-white dark:text-gray-900 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                </button> 
            </div>

        </div> 
    </div>  

    <div class= "flex justify-between my-3">
        <button wire:click="$dispatch('open')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
            {{ __('att.add') }}
        </button>
        
         
    </div>

    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-800  ">
        <tr class=" rtl:text-right ltr:text-left">
            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('att.emp') }} 
            </th>
            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('att.hours') }}
            </th>
            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
               
            </th>
        </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
                @forelse ($attds as $attd)
                    <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="ml-2 flex space-x-2 ">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                            <span class=""> </span>
                                            <a wire:navigate href="{{url(app()->getLocale().'/Emp'.'/'.$attd['id']) }}"  class=" hover:underline underline-offset-2">
                                                @if (app()->getLocale() == 'ar') {{ $attd['nom'] }}  @else {{ $attd['nomfr'] }}  @endif

                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-2">
                            <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                     {{ $attd['nbp']   }} 
                            </div>
                        </td>
                        <td></td>
                        
                    </tr>
                @empty
                @endforelse

  
        </tbody>
    </table>

</div>
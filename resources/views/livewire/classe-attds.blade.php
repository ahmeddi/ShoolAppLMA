<div class="w-full h-full px-4 my-8 ">

    <div class=" m-2">
        <div  class="flex space-x-8 justify-between items-center  text-center text-gray-500 my-2 ">
            <div class="flex ">
                    <div> <button  @class(['days','daysselceted' => $t_day,])   class="days " wire:click="thisDay" >{{ __('calandar.day') }}</button></div> 
                    <div> <button  @class(['days','daysselceted' => $p_day,])   class="days " wire:click="pastDay" >{{ __('calandar.p-day') }}</button></div> 
                    <div> <button  @class(['days','daysselceted' => $t_week,]) class="days " wire:click="thisWeek" >  {{ __('calandar.week') }}</button> </div> 
                    <div> <button  @class(['days','daysselceted' => $t_month,])   class="days " wire:click="thisMonth" >{{ __('calandar.month') }}</button></div> 
                    <div> <button  @class(['days','daysselceted' => $p_month,]) class="days" wire:click="pastMonth" > {{ __('calandar.pastM') }} </button> </div>
                    <div> <button  @class(['days','daysselceted' => $all,]) class="days " wire:click="alls" >  {{ __('calandar.tous') }}</button> </div> 

            </div>
            <div class="space-x-3 flex justify-around   ">
                 <input wire:model='day1'  class="h-10 w-40 inputs ml-2" type="date" name="randday"    />
                 <input wire:model='day2'  class="h-10 w-40 inputs ml-2" type="date" name="randday"    />
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
        <button wire:click="$dispatch('add')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
            {{ __('att.add') }}
        </button>
    </div>

    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-200 dark:bg-gray-800  ">
        <tr class="rtl:text-right ltr:text-left">
            <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('calandar.date') }} 
            </th>
            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('calandar.hours') }} 
            </th>
            <th scope="col" class="px-6 py-3   text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('calandar.classe') }} 
            </th>
            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                
            </th>

        </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
                @forelse ($attds as $attd)
                    <tr class="h-5 ">
                            <td class="px-6 py-2">
                                <a wire:navigate href="{{url(app()->getLocale().'/Attds/Classe/'.$attd->id) }}"  class=" hover:underline dark:decoration-white">
                                    <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                            {{ $attd->date   }} 
                                    </div>
                                </a>
                        </td>
                        </a>
                        
                        <td class="px-6 py-2">
                            <a wire:navigate href="{{url(app()->getLocale().'/Attds/Classe/'.$attd->id) }}"  class=" hover:underline dark:decoration-white">
                                <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                        @if ($attd->time == 1)
                                            8H - 10H
                                        @elseif($attd->time == 2)
                                            10H - 12H
                                        @elseif($attd->time == 3)
                                            12H - 14H
                                        @endif
                                </div>
                            </a>
                        </td>
                        <td class="px-6 py-2">
                            <a wire:navigate href="{{url(app()->getLocale().'/Attds/Classe/'.$attd->id) }}"  class=" hover:underline dark:decoration-white">
                                <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                        {{ $attd->classe->nom   }} 
                                </div>
                            </a>
                        </td>
                        <td class="flex space-x-2 py-2 px-2 h-full items-center">   
                            <div>
                                <button  wire:click="$dispatch('dlt',{ id: {{ $attd['id'] }} })" class=" stroke-red-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-600 dark:stroke-red-400 w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>                                                                               
                                </button>
                            </div>                                
                        </td>
                        
                       
                    </tr>
                @empty
                @endforelse

  
        </tbody>
    </table>

</div>
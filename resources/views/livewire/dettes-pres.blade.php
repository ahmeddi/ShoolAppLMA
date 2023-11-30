<div class="w-full h-full  p-3   ">
    <div  class=" bg-white dark:bg-gray-900 rounded-md p-3  flex space-x-8 justify-between  text-center text-gray-500 my-2 ">
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


<table class=" bg-white p-2 dark:bg-gray-900 rounded-md w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
    <thead class="bg-gray-100 dark:bg-gray-800  ">
        <tr>
            <th scope="col" class="rllt px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('ent.entreprise') }}  
            </th>
            <th scope="col" class="text-right px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('ent.montnat') }}  
            </th>
            <th scope="col" class="text-right px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('ent.date') }} 
            </th>
        </tr>
    </thead>

    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">

            @forelse ($detts as $dett)
                <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                    <td class="px-6 py-2">
                        <a  class="hover:underline" wire:navigate.hover  href="{{url(app()->getLocale().'/Entreprise/'. $dett->entreprise->id) }}">
                            <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                    {{ $dett->entreprise->nom    }}
                            </div>
                        </a>
                    </td>
                    
                    <td class="px-6 py-2">
                        <div class="text-right  w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                              <span class=" text-right" dir="ltr"> {{   number_format($dett->montant, 0, '.', ' ') }}</span>  
                        </div>
                    </td>
                    <td class="px-6 py-2">
                        <div class="text-right w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                 {{ $dett->date  }} 
                        </div>
                    </td>
                </tr>
            @empty
            @endforelse


    </tbody>
</table>

</div>
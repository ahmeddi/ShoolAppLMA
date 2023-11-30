<div class=" flex flex-col space-y-5">
    <div  class=" bg-white dark:bg-gray-900 rounded-md py-5 px-3  flex space-x-8 justify-between  text-center text-gray-500 my-2 ">
        <div class="flex ">
            <div> <button  @class(['days','daysselceted' => $t_month,])   class="days " wire:click="thisMonth" >{{ __('calandar.month') }}</button></div> 
            <div> <button  @class(['days','daysselceted' => $p_month,]) class="days" wire:click="pastMonth" > {{ __('calandar.pastM') }} </button> </div>
            <div> <button  @class(['days','daysselceted' => $n_month,]) class="days " wire:click="nextMonth" >  {{ __('calandar.n_month') }}</button> </div> 
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
    <div class=" flex justify-end my-2 font-semibold text-gray-900 dark:text-gray-50 px-8">
        <a class=" hover:underline" wire:navigate.hover href="{{url(app()->getLocale().'/Entreprises') }}">
            {{ __('ent.entreprises') }}
        </a>
    </div>
    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100  dark:bg-gray-900/50 w-full">
            <tr class="w-full " >
                <th scope="col" class="ltr:text-left rtl:text-right px-8 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.entreprise') }}
                </th>

                <th scope="col" class="px-6 py-3 text-right  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.montnat') }} 
                </th>
                <th scope="col" class="px-6 py-3 rllt  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.date') }} 
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
    @forelse ($detts  as $dette)
        <tr @class(['h-4','w-full','text-center','bg-red-500/20' => $dette->list, 'dark:bg-red-900/30' => $dette->list])  >
            <td dir="ltr" class="px-8 py-2 rllt whitespace-nowrap ">
                <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                     <a class=" hover:underline" wire:navigate.hover href="{{url(app()->getLocale().'/Entreprise'.'/'.$dette->entreprise_id) }}">
                        {{ $dette->entreprise->nom }} 
                     </a>
                 </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div dir="ltr" class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{   number_format($dette->montant, 0, '.', ' ') }}
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{ $dette->date }} 
                </div>
            </td>
            
        </tr>
    @empty

    @endforelse
  
        </tbody>
    </table>   
</div>

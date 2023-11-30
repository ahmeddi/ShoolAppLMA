<div>
    <div class="">
        <div class=" bg-white shadow-md p-3 dark:bg-gray-900 rounded-md">
                <div  class="flex space-x-4 justify-between  text-center text-gray-500  ">
                    <div class="flex  items-center">
                        <div> <button @class(['days w-24 text-sm','daysselceted' => $t_month,])  class="days w-40 text-sm " wire:click="thisMonth" >{{ __('calandar.month') }}</button></div> 
                        <div> <button  @class(['days  w-28 text-sm','daysselceted' => $p_month,]) class="days" wire:click="pastMonth" >{{ __('calandar.pastM') }}</button> </div> 
                        <div> <button @class(['days   text-sm','daysselceted' => $all,])  class="days" wire:click="alls" >{{ __('calandar.tous') }}</button> </div>
                        <select wire:change='fetchData' wire:model='sortBy'  class="inputs w-32 mx-3 "   required >
                            <option  class="text-sm" value="1">{{ __('compt.Paiement') }}</option>
                            <option class="text-sm" value="2">{{ __('compt.Solde+') }}</option>
                            <option class="text-sm" value="3">{{ __('compt.Solde-') }}</option>
                        </select>
                        <select wire:change='fetchData' wire:model='selectedClasseId'  class="inputs w-32 "   required >
                            <option  class="text-sm" value="*">{{ __('compt.Tous') }}</option>
                            @foreach ($classes as $classe)
                                <option  class="text-sm" value="{{$classe->id}}">{{$classe->nom}}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class=" flex justify-around   ">
                         <input wire:model='day1'  class="h-10 w-40 inputs  mx-1" type="date" name="randday"    />
                         <input wire:model='day2'  class="h-10 w-40 inputs mx-1" type="date" name="randday"    />
                        <button wire:click='randday' class="relative focus:outline-none bg-teal-600 hover:bg-teal-800 dark:bg-gray-100 dark:hover:bg-gray-200 w-12 h-10 rounded-md">
                                    <div class=" absolute top-2.5 left-3.5">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-white dark:text-gray-900 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                        </svg>
                                    </div>
                        </button> 
                    </div>
    
                </div> 
        </div> 

        <div class="my-4">
            <table  class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-900  ">
                <tr class="rtl:text-right ltr:text-left">
                    <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        
                    </th>
                    <th scope="col" class=" ltr:text-right px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('compt.Paiement') }}
                    </th>
                    <th scope="col" class="ltr:text-right px-10 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('compt.solde') }}
                    </th>
                </tr>
                </thead>
                <tbody class="  dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
            
                        @forelse($parents as $parent)
                            <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70  ">
                                
                                <td class="px-8 py-2">
                                    <a wire:navigate.hover href="{{url(app()->getLocale().'/Parent/'.$parent->id) }}">
                                        <div class=" text-sm font-bold text-gray-600 dark:text-gray-200">
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $parent->nom }}
                                                    
                                                @else
                                                    {{ $parent->nomfr }}
                                                    
                                                @endif
                                        </div>
                                    </a>
                                </td>
                                <td class="px-8 py-2">
                                    <div dir="ltr" class=" text-right text-sm font-bold text-gray-900 dark:text-gray-200">
                                             {{  number_format($parent->paiements_sum, 0, '.', ' ')  }} 
                                    </div>
                                </td>
                                <td class="px-3">
                                    <div dir="ltr" class=" px-8 text-right text-sm font-bold text-gray-900 dark:text-gray-200">
                                        {{  number_format($parent->solde, 0, '.', ' ')  }} 
                                    </div>
                                </td>
                               
                            </tr>
                        @empty
                        @endforelse
                </tbody>
            </table>
        </div>
        
        

        
    </div>


    
</div>

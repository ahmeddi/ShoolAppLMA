<div>
    <div class="">
        <div class=" ">
                <div  class="flex space-x-4 justify-between  text-center text-gray-500  ">
                    <div class="flex  items-center">
                       <select  wire:model.live='filter_sal'  class="inputs w-32 mx-3 "   required >
                            <option  class="text-sm" value="*">{{ __('compt.Tous') }}</option>
                            <option class="text-sm" value="1">{{ __('prof.profs') }}</option>
                            <option class="text-sm" value="2">{{ __('emp.emps') }}</option>
                        </select>
                    </div>
                    <div class="flex w-full justify-end">
                        <x-Dropdown.dropdown-menu :$ranges :$selectedRange :$rangeName :$customRangeStart :$customRangeEnd/> 
                    </div>
                </div> 
        </div> 

        <div class=" w-full relative overflow-x-auto my-3">
            <table  class=" rounded-lg w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-900  ">
                <tr class="rtl:text-right ltr:text-left">
                    <th scope="col" class="px-2 lg:px-6 py-3  text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('compt.nom') }}
                    </th>
                    <th scope="col" class="  text-center px-2 lg:px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('compt.type') }}
                    </th>
                    <th scope="col" class="hidden lg:table-cell text-center  px-2 lg:px-10 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        {{ __('compt.motif') }}
                    </th>
                    <th scope="col" class="px-2 flex rtl:justify-start ltr:justify-end lg:px-6 text-right py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        <x-order.index.sortable types='montant' column="montant"  :$sortCol :$sortAsc>
                            <div dir="ltr"  class="" >{{ __('compt.mont') }} </div>
                        </x-order.index.sortable>
                    </th>
                    
                    <th scope="col" class=" text-right px-2 lg:px-6 py-3 text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                        <x-order.index.sortable column="date" :$sortCol :$sortAsc>
                            <div >{{ __('compt.date') }} </div>
                        </x-order.index.sortable>
                    </th>
                </tr>
                </thead>
                <tbody class="  dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
            
                        @forelse($salaries as $salarie)
                            <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70  ">
                                
                                <td class=" px-2 lg:px-8 py-2">
                                    <a wire:navigate.hover 
                                             @if ($salarie['type'] == 1)
                                             href="{{url(app()->getLocale().'/Prof/'.$salarie['id']) }}"
                                             @else
                                             href="{{url(app()->getLocale().'/Emp/'.$salarie['id']) }}"
                                             @endif
                                             >
                                    
                                        <div class=" text-sm font-semibold text-gray-600 dark:text-gray-200">
                                                @if (app()->getLocale() == 'ar')
                                                    {{ $salarie['nom']   }}
                                                @else
                                                    {{ $salarie['nomfr']   }}
                                                @endif
                                        </div>
                                    </a>
                                </td>
                                <td class="hidden lg:table-cell px-2 lg:px-8 py-2">
                                    <div class="  text-center text-sm font-semibold text-gray-900 dark:text-gray-200">
                                             @if ($salarie['type'] == 1)
                                             {{ __('prof.prof') }}
                                             @else
                                             {{ __('emp.emp') }}
                                             @endif
                                    </div>
                                </td>
                                <td class=" px-2 lg:px-8 py-2">
                                    <div  class="  text-center text-sm font-semibold text-gray-900 dark:text-gray-200">
                                             @if ($salarie['motif'] == 1)
                                             <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                                 {{ __('compt.sal') }} 
                                             </div>  
                                            @endif
                                            @if ($salarie['motif'] == 2)
                                                <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                                    {{ __('compt.debt') }} 
                                                </div>
                                            @endif
                                            @if ($salarie['motif'] == 3)
                                                <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                                    {{ __('compt.bonis') }}
                                                </div>
                                            @endif
                                    </div>
                                </td>

                                <td class="">
                                    <div dir="ltr" class=" px-2 lg:px-3 text-right text-sm font-bold text-gray-900 dark:text-gray-200">
                                        {{  number_format($salarie['montant'], 0, '.', ' ')  }} 
                                    </div>
                                </td>
                                <td class=" px-2 lg:px-3">
                                    <div  class=" flex justify-center rtl:justify-start text-right text-sm font-semibold text-gray-900 dark:text-gray-200">
                                        {{  $salarie['date'] }} 
                                    </div>
                                </td>
                               
                            </tr>
                        @empty
                        @endforelse

                        <tr class=" bg-gray-100 dark:bg-gray-900  rounded-b-lg overflow-hidden">
                            <td class=" px-2 lg:px-8">
                                <div  class=" rllt text-right text-sm font-semibold text-gray-900 dark:text-gray-100">
                                    {{ __('home.tot') }} 
                                </div>
                            </td>
                            <td class="hidden lg:table-cell"></td>
                            <td></td>
                            <td class=" px-2 lg:px-3 py-3 text-center text-sm font-semibold text-gray-900 dark:text-gray-200">
                               <div dir="ltr" class="text-right text-sm font-bold text-gray-900 dark:text-gray-200">
                                {{ number_format($tots, 0, '.', ' ') }} 
                            </div>
                            </td>
                            <td>

                            </td>
                        </tr>
                </tbody>
            </table>
            <div  wire:loading.flex class=" rounded-lg overflow-hidden flex justify-center  items-center w-full h-full absolute top-0 dark:bg-gray-950 opacity-50 bg-white z-5">
                <div role="status ">
                    <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-teal-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
        
        

        
    </div>


    
</div>

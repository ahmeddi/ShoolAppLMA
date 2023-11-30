<div class="max-w-7xl mx-auto px-4">
    <div class=" my-2 bg-white shadow-md p-3 dark:bg-gray-900 rounded-md ">
        <div  class="flex space-x-8 justify-between  text-center text-gray-500 ">
            <div class="flex ">
                <div> <button  @class(['days','daysselceted' => $t_month,]) wire:click="thisMonth" >{{ __('home.tmonth') }}</button></div> 
                <div> <button  @class(['days ','daysselceted' => $p_month,])  wire:click="pastMonth" > {{ __('home.lmonth') }}</button> </div>
                <div> <button  @class(['days','daysselceted ' => $t_week,])  wire:click="thisWeek" > {{ __('home.week') }}</button> </div> 
                <div> <button  @class(['days','daysselceted' => $all,])  wire:click="alls" > {{ __('home.tous') }} </button> </div> 
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
    <div x-data="{ frais : @entangle('frais') }"  class="flex justify-around dark:bg-gray-900 overflow-hidden  p-3 rounded-lg">
        
        <a wire:navigate.hover href="{{url(app()->getLocale().'/Dettes/Parents') }}">
            <div class="bg-white dark:bg-gray-800 rounded-md shadow-lg   h-28 w-48 border-2 border-green-600 dark:border-green-800">
                <div class="  w-full  flex  ">
                    <div class=" h-full  w-full">
                        <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{ __('compt.fraisS') }} </div>
                        <div dir="ltr" class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold">{{ number_format(($recet), 0, '.', ' ') }}</div>
                        <div dir="ltr" class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 ">{{ number_format($frais, 0, '.', ' ') }}</div>
                        {{-- <input x-data="frais" x-mask:dynamic="$money($input, '.', ' ')"  class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "/> --}}

                    </div>
                </div>
            </div>
        </a>

        <a wire:navigate.hover href="{{url(app()->getLocale().'/Dettes/Prets') }}">
            <div class="bg-white dark:bg-gray-800 rounded-md shadow-lg  h-28 w-48 border-2 border-green-600 dark:border-green-800">
                <div class="  w-full  flex  ">
                    <div class=" h-full  w-full">
                        <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{ __('compt.don') }}</div>
                        <div  dir="ltr" class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold"> {{ number_format($dettes, 0, '.', ' ') }} </div>
                    </div>
                </div>
            </div>
        </a>

        <a wire:navigate.hover href="{{url(app()->getLocale().'/Salaires') }}">
            <div class="bg-white dark:bg-gray-800 rounded-md shadow-lg  h-28 w-48  border-2 border-red-600 dark:border-red-800">
                <div class="  w-full  flex  ">
                    <div class=" h-full  w-full">
                        <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{ __('compt.sal') }} </div>
                        <div  dir="ltr" class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold"> {{  number_format($sal, 0, '.', ' ') }}</div>
                        <div  dir="ltr" class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{  number_format($hon, 0, '.', ' ') }}</div>
                    </div>
                </div>
            </div>
        </a>
        
        <a wire:navigate.hover href="{{url(app()->getLocale().'/Depenses') }}">
            <div class="bg-white dark:bg-gray-800 rounded-md shadow-lg  h-28 w-48 border-2 border-red-600  dark:border-red-800">
                    <div class="  w-full  flex  ">
                        <div class=" h-full  w-full">
                            <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{ __('compt.dep') }}</div>
                            <div  dir="ltr" class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold"> {{ number_format($depances, 0, '.', ' ')  }} </div>
                        </div>
                    </div>
            </div>
        </a>


        <a wire:navigate.hover href="{{url(app()->getLocale().'/Dettes') }}">
            <div class="bg-white dark:bg-gray-800 rounded-md shadow-lg  h-28 w-48  border-2 border-red-600 dark:border-red-800">
                <div class="  w-full  flex  ">
                    <div class=" h-full  w-full">
                        <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{ __('compt.dette') }} </div>
                        <div  dir="ltr" class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold"> {{  number_format($peis, 0, '.', ' ') }}</div>
                        <div  dir="ltr" class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{  number_format($dette, 0, '.', ' ') }}</div>
                    </div>
                </div>
            </div>
        </a>
        

            
        
              
    </div>

    <div>
        <div class="px-8 bg-white dark:bg-gray-900 p-3 w-full h-12 my-2 rounded-md shadow-md align-middle flex items-center">
            <div class="  text-lg mx-4 text-gray-700 dark:text-gray-300 flex items-center align-middle justify-center capitalize "> {{ __('compt.solde') }}:</div>
            <div  dir="ltr" class="mx-4 flex flex-col items-center   text-lg text-gray-800 align-middle dark:text-gray-200 font-bold"> {{ number_format($comps, 0, '.', ' ') }} </div>
        </div>
    </div>
</div>
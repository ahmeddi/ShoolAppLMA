<div class="flex m-1 h-full space-x-2  ">
    <div class=" relative w-full h-full   ">
        <div class="w-full  ">
            <div class="flex w-auto  mb-4  ">
                <div class="flex w-full  justify-between text-teal-900">
                    <div class=" w-full p-1">
                        <div class="w-full flex flex-col mx-3 space-y-1">

                            @can('dir')
                                    <div class=" w-full flex justify-end">
                                        <button  wire:click="$dispatch('edit',{ id: {{ $ids }} })" class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded  ">
                                            <div class="mx-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </div>
                                            <div> 
                                                {{ __('prof.prof-info') }}
                                            </div>
                                        </button>
                                    </div>
                            @endcan
                            
                            @cannot('sur')
                            <div class=" grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1  sm:gap-3 mb-4 lg:my-0  overflow-hidden sm:p-1 p-3 rounded-lg">
                                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md sm:w-full  sm:h-12  lg:h-24 lg:w-48 ">
                                    <a  wire:navigate.hover  href="{{url(app()->getLocale().'/Parent'.'/'.$ids.'/Frais') }}" class="h-full w-full">
                                        <div class="  w-full  flex items-center mb-1  ">
                                            <div class=" h-full flex w-full lg:flex-col sm:items-center ">
                                                <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center  capitalize pt-2 ">{{ __('etudiants.cot') }} </div>
                                                <div dir="ltr" class="flex flex-col items-center pt-1 text-xl  w-full h-full lg:text-3xl text-gray-800 dark:text-gray-200 font-bold">  {{ number_format($frais, 0, '.', ' ') }}</div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>

                                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md sm:w-full my-2 lg:my-0    sm:h-12  lg:h-24 lg:w-48 ">
                                    <a  wire:navigate.hover  href="{{url(app()->getLocale().'/Parent'.'/'.$ids.'/Paiements') }}" class="h-full w-full">
                                        <div class="  w-full  flex items-center mb-1  ">
                                            <div class=" h-full flex w-full lg:flex-col sm:items-center ">
                                                <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center  capitalize pt-2 ">{{ __('home.reccet') }} </div>
                                                <div dir="ltr" class="flex flex-col items-center pt-1 text-xl  w-full h-full lg:text-3xl text-gray-800 dark:text-gray-200 font-bold">  {{ number_format($paiements, 0, '.', ' ') }}</div>
                                            </div>
                                        </div>
                                    </a> 
                                </div>

                              

                        
                                @cannot('parent')
                                    <div class="bg-white dark:bg-gray-900 rounded-md shadow-md  sm:w-full  sm:h-12  lg:h-24 lg:w-48">
                                        <a  wire:navigate.hover href="{{url(app()->getLocale().'/Parent'.'/'.$ids.'/Remises') }}" class="h-full w-full">
                                            <div class="  w-full  flex items-center mb-1  ">
                                                <div class=" h-full  w-full">
                                                    <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center  capitalize pt-2 ">{{ __('home.disc') }}  </div>
                                                    <div dir="ltr" class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold">  {{    number_format($remises, 0, '.', ' ') }}</div>
                                                </div>
                                            </div>
                                        </a> 
                                    </div>  
                                @endcannot

                                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md sm:w-full my-2 lg:my-0 sm:h-12  lg:h-24 lg:w-48 ">
                                        <div class="  w-full  flex items-center mb-1  ">
                                            <div class=" h-full flex w-full lg:flex-col sm:items-center ">
                                                <div class=" font-bold text-sm w-full text-gray-500 dark:text-gray-300 flex items-center justify-center  capitalize pt-2 ">{{ __('home.compt') }} </div>
                                                <div dir="ltr" class="flex flex-col items-center pt-1 text-xl  w-full h-full lg:text-3xl text-gray-800 dark:text-gray-200 font-bold">  {{ number_format($compts, 0, '.', ' ') }}</div>
                                            </div>
                                        </div>
                                </div>
                                
                        
                            </div>
                                
                            @endcannot
                           

                            @can('dir')
                                <div class="w-full flex justify-between my-5  px-2">
                                        <button wire:click="$dispatch('add')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                                            + {{ __('etudiants.etuds-add') }}
                                        </button>
                                </div>
                            @endcan

                           

                            

                            <div class="mt-4 p-1">
                                <table class="w-full overflow-x-auto table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
                                    <thead class="bg-gray-100  dark:bg-gray-900 w-full">
                                        <tr class="w-full " >
                                            <th scope="col" class="ltr:text-left rtl:text-right px-12 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                {{ __('etudiants.etud') }}
                                            </th>
                                            <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                {{ __('etudiants.nb') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
                                
                                @foreach ($etuds as $etudiant)

                                        <tr @class(['h-4','w-full','text-center','bg-red-500/20' => $etudiant->list, 'dark:bg-red-900/30' => $etudiant->list])  >

                                                <td class="px-6 py-3 w-1/2 whitespace-nowrap">
                                                    <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etudiant->id) }}" class=" hover:underline" >
                                                        <div class="flex items-center w-full">
                                                            <div class="flex-shrink-0 h-10 w-10 mx-4 text-gray-300 dark:text-gray-600 rounded-full overflow-hidden">
                                                                @if ($etudiant->image)
                                                                    <img  class=" object-cover h-full w-full" src="{{ asset('storage'.'/'.$etudiant->image) }}" />
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
                                                                            {{ $etudiant->nom }} 
                                                                    </div>
                                                                    <div class="text-sm text-gray-600 dark:text-gray-400">
                                                                        <span class="font-ar capitalize ">{{ $etudiant->nomfr }} </span>
                                                                    </div>
                                                                </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="px-6 py-3 whitespace-nowrap">
                                                    <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etudiant->id) }}" class=" hover:underline" >
                                                        <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $etudiant->nb }}</div>
                                                        <div  class="text-sm text-gray-900 dark:text-gray-300"> {{  $etudiant->classe->nom  }}</div>
                                                    </a>
                                                </td>                                   
                                        </tr>
                                    
                                @endforeach
                              
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
    
                        </div>
    
                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

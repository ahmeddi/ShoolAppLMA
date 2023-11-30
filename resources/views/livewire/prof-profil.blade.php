<div  class="" class="flex m-3 h-full space-x-2  ">
    <div class=" relative w-full h-full  p-2 rounded-md  ">
        <div class="w-full">
            <div class="flex p-2 w-auto  mb-4  ">
                <div class=" w-40 ">
                    {{-- <button  wire:click="$dispatch('pic')" class=" relative flex justify-center object-cover items-center w-full h-36 mt-2  rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600">
                        <div class=" absolute bg-gray-600/50 dark:bg-gray-200/50 w-full h-full opacity-0 hover:opacity-100">
                            <div class="w-full h-2/3"></div>
                            <div class=" text-sm font-semibold h-1/3 w-full bg-gray-900/50 dark:bg-gray-700/50 text-center pt-2 text-white"> {{ __('etudiants.profil-photo') }}</div>
                        </div>
                        @if ($prof->image)
                            <img wire:model='image' src="{{ asset('storage/'.$prof->image) }}" class="h-full w-auto object-cover "    />
                        @else --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-full text-gray-200 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>
                        {{-- @endif
                    </button> --}}

                </div>
                <div class="flex w-full  justify-between text-teal-900">
                    <div class=" w-full p-3">
                        <div class="w-full flex flex-col space-y-1">

                            <div class="w-full mx-2 mb-4 dark:text-teal-50 flex text-xl  font-bold">
                                <div>{{ $prof->nom  }} - {{ $prof->nomfr }}</div>
                            </div>

                            <table>
                                <tr class="py-1 my-1">
                                    <td class=" rtl:w-1/6 ltr:w-2/6">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('prof.prof-tel') }}:
                                            </div>    
                                    </td>
                                    <td  class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div dir="ltr" class=" dark:text-teal-100"> {{  chunk_split($prof->tel1, 2, ' ') }}  -  {{  chunk_split($prof->tel2, 2, ' ') }}</div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('prof.prof-nni') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $prof->nni  }}</div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('prof.prof-nc') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $prof->se  }}</div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                 {{ __('prof.prof-diplom') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $prof->diplom  }}</div>

                                    </td>
                                </tr>
                            </table>
                               
    
                        </div>
                        <div>
    
                        </div>
    
                    </div>
                    <div class=" w-2/6 p-1 "> 
                        <div>
                            @can('dir')
                                <button  wire:click="$dispatch('opene',{ id: {{ $prof->id }} })" class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                    <div class="mx-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                        
                                    </div>
                                    <div> 
                                        {{ __('prof.prof-info') }}
                                    </div>
                                </button>
                            @endcan
                        </div>
                        
                       
                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Profs'.'/'.$prof->id) }}" class="flex bg-teal-500 text-teal-50 p-2 rounded ">
                            <div class="mx-2 ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>                                        
                            </div>
                            <div>
                                {{ __('etudiants.profil-jorns') }}
                            </div>
                        </a>

                        @if($prof->ts == 2)
                            @cannot('sur')
                                <a wire:navigate.hover href="{{url(app()->getLocale().'/Prof'.'/'.$prof->id.'/Classes') }}"  class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                    <div class="mx-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                        </svg>                                       
                                    </div>
                                    <div> 
                                        {{ __('prof.prof-class') }}
                                    </div>
                                </a>
                            @endcannot
                        @endif


                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Prof'.'/'.$prof->id.'/Att') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                                                         
                            </div>
                            <div> 
                                {{ __('prof.prof-pres') }}
                            </div>
                        </a>

                        @cannot('sur')
                            <a wire:navigate.hover  href="{{url(app()->getLocale().'/Prof'.'/'.$prof->id.'/Compt') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                    </svg>                                        
                                </div>
                                <div>  
                                    {{ __('prof.prof-compt') }}
                                </div>
                            </a>
                        @endcannot

                        @can('admin')
                            <button wire:click="$dispatch('del',{ id: {{ $prof->id }} })"   class="flex mb-2 bg-red-500 hover:bg-red-700 text-red-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>                                                                                                               
                                </div>
                                <div>  
                                    {{ __('prof.prof-del') }}
                                </div>
                            </button>
                        @endcan

                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

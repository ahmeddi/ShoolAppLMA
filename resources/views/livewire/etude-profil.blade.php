<div  class="" class="flex m-3 h-full space-x-2  ">
    <div class=" relative p-2  ">
        <div class="w-full  ">
            <div class="flex p-2 w-auto  mb-4  ">
                @cannot('parent')
                        <div class=" w-40 ">
                            <button  wire:click="$dispatch('pic')" class=" relative flex justify-center object-cover items-center w-full h-36 mt-2  rounded-full overflow-hidden bg-gray-300 dark:bg-gray-500">
                                <div class=" absolute bg-gray-600/50 dark:bg-gray-200/50 w-full h-full opacity-0 hover:opacity-100">
                                    <div class="w-full h-2/3"></div>
                                    <div class=" text-sm font-semibold h-1/3 w-full bg-gray-900/50 dark:bg-gray-700/50 text-center pt-2 text-white"> {{ __('etudiants.profil-photo') }}</div>
                                </div>
                                @if ($etud->image)
                                    <img wire:model='image' src="{{ asset('storage/'.$etud->image) }}" class="h-full w-auto object-cover "    />
                                @else 
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-full text-gray-100 dark:text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                    </svg>
                                @endif
                            </button> 

                        </div>
                @endcannot
                <div class="flex flex-col lg:flex-row md:flex-row w-full  justify-between text-teal-900">

                    <div class=" w-full p-3">
                        <div class="w-full flex flex-col mx-3 space-y-1">

                            <div class="capitalize w-full mx-2 mb-4 flex flex-col lg:flex-row md:flex-col text-xl items-center  font-bold dark:text-teal-50">
                                <div class="m-2">{{ $etud->nom }}</div>
                                <div class="m-2">{{ $etud->nomfr  }}</div>
                            </div>

                            <table>
                                <tr class="py-2 my-2">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('etudiants.add-nb') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit  dark:text-teal-100 font-bold flex justify-center items-center">
                                            <div class=" dark:text-teal-100">{{ $etud->nb }} - {{ $etud->classe->nom  }}</div>
                                    </td>
                                </tr>
                                @cannot('parent')
                                    <tr class="py-2 my-2">
                                        <td class="w-2/12">                                                                                 
                                                <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                    {{ __('etudiants.profil-prent') }}
                                                </div>    
                                        </td>
                                        <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                            <a wire:navigate class=" hover:underline dark:decoration-slate-50"  href="{{url(app()->getLocale().'/Parent/'.$etud->parent->id)}}">
                                                <div  class=" dark:text-teal-100">
                                                    {{ $etud->parent->nom  }} -
                                                    <span dir="ltr">
                                                        {{  chunk_split($etud->parent->telephone, 2, ' ') }}
                                                    </span> 
                                                </div>
                                            </a>
                                        </td>
                                    </tr> 
                                @endcannot
                                
                                @if ($etud->ddn)
                                <tr class="py-2 my-2">
                                    <td class="w-2/6">                                                                                 
                                            <div  class=" w-fit text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('etudiants.profil-ddn') }}
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $etud->ddn  }} </div>

                                    </td>
                                </tr>
                                @endif
                                
                                @if ($etud->nni)
                                <tr class="py-2 my-2">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('etudiants.profil-nni') }}
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $etud->nni  }} </div>

                                    </td>
                                </tr>
                                @endif
                                
                                @if ($etud->nc)
                                <tr class="py-2 my-2">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                               
                                                {{ __('etudiants.profil-ns') }}
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $etud->nc  }} </div>

                                    </td>
                                </tr>
                                @endif
                                
                            </table>
    
                        </div>
                        <div>
    
                        </div>
    
                    </div>
                    <div class=" lg:w-2/3 md:w-2/3 p-1 "> 
                            @can('dir')
                                <button wire:click="$dispatchTo('etud-edit','open',{ id: {{ $etud->id }} })"   class="  mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                    <div class="flex ">
                                        <div class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg> 
                                        </div>
                                        <div> 
                                            {{ __('etudiants.profil-edit') }}
                                        </div>
                                    </div>
                                </button>
                            @endcan
                        
                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Jorn'.'/'.$etud->classe->id) }}" class="flex bg-teal-500 text-teal-50 p-2 rounded ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>                                        
                            </div>
                            <div>
                                {{ __('etudiants.profil-jorns') }}
                            </div>
                        </a>

                        
                        @if ($etud->soir)
                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Jorn'.'/'.$etud->classe->id).'/Soir' }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="rtl:ml-4 ltr:mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>                                                                                                                    
                                </div>
                                <div> {{ __('classe.soir-jorn') }} </div>
                            </a>
                        @endif

                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etud->id.'/Att') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                                                         
                            </div>
                            <div> 
                                {{ __('etudiants.profil-pres') }}
                            </div>
                        </a>

                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etud->id.'/Notes') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                    </svg>                                       
                                </div>
                                <div>  
                                    {{ __('notes.notes') }}
                                </div>
                            </a>

                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Result'.'/'.$etud->id.'/Notes') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0118 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3l1.5 1.5 3-3.75" />
                                      </svg>                                                                             
                                </div>
                                <div>  
                                    {{ __('etudiants.profil-result') }}
                                </div>
                            </a>
                        

                        @cannot('parent')
                            <button wire:click="$dispatchTo('etud-semes','opensems',{ id: {{ $etud->id }} })"   class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>                                                                          
                                </div>
                                <div>  
                                    {{ __('etudiants.profil-bull') }}
                                </div>
                            </button>
                        @endcannot

                        @can('admin')
                            <button wire:click="$dispatch('del',{ id: {{ $etud->id }} })"   class="flex mb-2 bg-red-500 hover:bg-red-700 text-red-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>                                                                                                               
                                </div>
                                <div>  
                                    {{ __('etudiants.profil-del') }}
                                </div>
                            </button>
                        @endcan

                        
                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

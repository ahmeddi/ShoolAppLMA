<div class="flex m-3 h-full space-x-2  ">
    <div class=" relative w-full h-full  p-2  ">
        <div class="w-full  ">
            <div class="flex p-2 w-auto  mb-4  ">
                <div class="flex w-full  justify-between text-teal-900">
                    <div class=" w-full p-3">
                        <div class="w-full flex flex-col mx-3 space-y-1">

                            <div class="w-full mx-2 mb-4 flex text-5xl uppercase items-center  font-bold dark:text-teal-50">
                                <div>{{ $Classe->nom  }} </div>
                            </div>

                            <div class="flex ">
                                <div class="flex justify-center items-center bg-teal-100 dark:bg-teal-900/70 rounded-lg text-left overflow-hidden   w-48  ">
                                    <div class=" p-4">
                                        <div class="flex justify-center">
                                            <div class="text-center ">
                                                <h3 class="text-base leading-6 font-medium text-teal-600 dark:text-teal-300">{{ __('classe.prix') }}</h3>
                                                <p class="text-3xl font-bold text-teal-800 dark:text-teal-100">{{ $Classe->prix  }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-center items-center bg-teal-100 dark:bg-teal-900/70 rounded-lg text-left overflow-hidden  w-48 mx-3 ">
                                    <div class=" p-4">
                                        <div class="flex justify-center">
                                            <div class="text-center ">
                                                <h3 class="text-base leading-6 font-medium text-teal-600 dark:text-teal-300">{{ __('classe.etuds') }}</h3>
                                                <p class="text-3xl font-bold text-teal-800 dark:text-teal-100">{{ $Classe->etuds->count()  }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
    
                        </div>
    
                    </div>
                    <div class=" w-1/3 p-1 "> 
                        @can('dir')
                            <button  wire:click="$dispatchTo('class-edit','open')"   class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                <div class="flex">
                                    <div class="rtl:ml-4 ltr:mr-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>
                                    </div>
                                    <div>{{ __('classe.edit') }}</div>
                                </div>
                            </button>
                        @endcan
                        
                        <a  wire:navigate.hover href="{{url(app()->getLocale().'/Classe/List'.'/'.$Classe->id) }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="rtl:ml-4 ltr:mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                </svg>                                    
                            </div>
                            <div>{{ __('classe.list') }}</div>
                        </a>

                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Jorn'.'/'.$Classe->id) }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="rtl:ml-4 ltr:mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>                                                                              
                            </div>
                            <div> {{ __('jorns.emploi') }} </div>
                        </a>

                        @if ($Classe->soir)
                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Jorn'.'/'.$Classe->id).'/Soir' }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="rtl:ml-4 ltr:mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>                                                                                                                    
                                </div>
                                <div> {{ __('classe.soir-jorn') }} </div>
                            </a>
                        @endif
                        

                        @can('dir')
                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Classe'.'/'.$Classe->id).'/Mats' }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="rtl:ml-4 ltr:mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                    </svg>                                             
                                </div>
                                <div> {{ __('classe.mats') }} </div>
                            </a>
                        @endcan

                        

                        @can('dir')
                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Classe'.'/'.$Classe->id).'/Horaires' }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="rtl:ml-4 ltr:mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>                                                                                  
                                </div>
                                <div> {{ __('classe.time') }} </div>
                            </a>
                        @endcan

                        @can('dir')
                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Classe'.'/'.$Classe->id).'/Results' }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 0 0-3.375-3.375h-1.5a1.125 1.125 0 0 1-1.125-1.125v-1.5A3.375 3.375 0 0 0 6.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0 0 15 2.25h-1.5a2.251 2.251 0 0 0-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 0 0-9-9Z" />
                                </svg>                                                                                                            
                            </div>
                            <div>  
                                {{ __('classe.result') }}
                            </div>
                        </a>
                        @endcan

                        @can('dir')
                            <button wire:click="$dispatchTo('etud-semes','openRecomendation',{ id: {{ $Classe->id }} })"  class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75" />
                                      </svg>                                                                                                               
                                </div>
                                <div>  
                                    {{ __('classe.recom') }}
                                </div>
                            </button>
                        @endcan


                        @can('dir')
                            <button wire:click="$dispatchTo('etud-semes','opensemsclass',{ id: {{ $Classe->id }} })"  class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>                                                                          
                                </div>
                                <div>  
                                    {{ __('classe.bult') }}
                                </div>
                            </button>
                        @endcan


                        
                       

                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

<div  class="" class="flex m-3 h-full space-x-2  ">
    <div class=" relative p-2  ">
        <div class="w-full  ">
            <div class="flex flex-col lg:flex-row p-2 w-auto  mb-4  ">
                <div class="flex flex-col lg:flex-row md:flex-row w-full  justify-between text-teal-900">
                    <div class="w-full lg:w-2/3 my-2 md:my-2 lg:my-1 px-4">
                        <div class="max-w-4xl  bg-white dark:bg-transparent w-full rounded-lg">
                            <div class="p-4 border-b text-gray-800 dark:text-gray-200 dark:border-gray-700">
                                <div class=" flex flex-col lg:flex-row gap-2  items-center">
                                    @can('parent')
                                    <div class=" w-auto lg:w-40 h-40 flex justify-center items-center lg:items-start relative ">
                                        <div class=" @if($etud->card ==1) ring ring-yellow-300 @endif @if($etud->card ==2) ring ring-orange-500 @endif @if($etud->card ==3) ring ring-red-700 @endif   shadow-lg relative flex justify-center object-cover items-center w-40 h-40 mt-2  rounded-full overflow-hidden bg-gray-300 dark:bg-gray-500">
                                            @if ($etud->image)
                                                <img wire:model='image' src="{{ asset('storage/'.$etud->image) }}" class="h-full w-auto object-cover "    />
                                            @else 
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-full text-gray-100 dark:text-gray-800" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                                </svg>
                                            @endif
                                        </div> 

                                        <div class=" absolute -bottom-4 ">
                                            @if ($etud->card == 1)
                                                <div class=" flex">
                                                        <div class=" fill-yellow-300 rotate-180">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10  text-yellow-300 ">
                                                                <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                </div>
                                            @elseif ($etud->card == 2)
                                                <div class="flex">
                                                    <div class=" fill-orange-500 rotate-180">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10  text-orange-500 ">
                                                            <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            @elseif ($etud->card == 3)
                                                <div class="flex">
                                                    <div class=" fill-red-700 rotate-180">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10  text-red-700 ">
                                                            <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    
                                                </div>
                                            @endif
                                       </div>
                                    </div>
                                    @endcan
                                    @cannot('parent')
                                        <div class=" w-auto lg:w-40 h-40 flex justify-center items-center lg:items-start relative ">
                                            <button  wire:click="$dispatch('pic')" class=" @if($etud->card ==1) ring ring-yellow-300 @endif @if($etud->card ==2) ring ring-orange-500 @endif @if($etud->card ==3) ring ring-red-600 @endif   shadow-lg relative flex justify-center object-cover items-center w-40 h-40 mt-2  rounded-full overflow-hidden bg-gray-300 dark:bg-gray-500">
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

                                            <div class=" absolute -bottom-4 ">
                                                @if ($etud->card == 1)
                                                    <div class=" flex">
                                                            <div class=" fill-yellow-300 rotate-180">
                                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10  text-yellow-300 ">
                                                                    <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                                                                </svg>
                                                            </div>
                                                    </div>
                                                @elseif ($etud->card == 2)
                                                    <div class="flex">
                                                        <div class=" fill-orange-500 rotate-180">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10  text-orange-500 ">
                                                                <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                @elseif ($etud->card == 3)
                                                    <div class="flex">
                                                        <div class=" fill-red-600 rotate-180">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10  text-red-600 ">
                                                                <path fill-rule="evenodd" d="M10.5 3A1.501 1.501 0 0 0 9 4.5h6A1.5 1.5 0 0 0 13.5 3h-3Zm-2.693.178A3 3 0 0 1 10.5 1.5h3a3 3 0 0 1 2.694 1.678c.497.042.992.092 1.486.15 1.497.173 2.57 1.46 2.57 2.929V19.5a3 3 0 0 1-3 3H6.75a3 3 0 0 1-3-3V6.257c0-1.47 1.073-2.756 2.57-2.93.493-.057.989-.107 1.487-.15Z" clip-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                        
                                                    </div>
                                                @endif
                                           </div>
                                        </div>
                                    @endcannot
                                    <div class="  m-2 flex flex-col w-full text-center text-gray-800 dark:text-gray-100 justify-center items-centre">
                                        <div class="  m-2 flex flex-col w-full text-center text-gray-800 dark:text-gray-100 justify-center items-centre">
                                            <div> 
                                                <h2 class="text-2xl ">
                                                    {{  app()->getLocale() == 'ar' ? $etud->nom : $etud->nomfr }}
                                                </h2>
                                            </div>
                                            <div>
                                                <p class="text-sm my-1 ">
                                                    {{  app()->getLocale() == 'ar' ? $etud->nomfr : $etud->nom }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex w-full justify-center">
                                            @forelse ($badges as $item)
                                                <div class=" m-2">
                                                    <img wire:model='image' src="{{ asset('storage/Badges/'. $item->badge->id.'.png') }}" class="h-28 w-auto object-cover "    />
                                                </div>
                                            @empty
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="md:grid md:grid-cols-2  md:space-y-0 space-y-1 p-4 border-b text-gray-800 dark:text-gray-200 dark:border-gray-700">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ __('etudiants.add-nb') }}:
                                    </p>
                                    <p>
                                        {{ $etud->nb }} - {{ $etud->classe->nom  }}
                                    </p>
                                </div>
                                <div class="md:grid md:grid-cols-2  md:space-y-0 space-y-1 p-4 border-b text-gray-800 dark:text-gray-200 dark:border-gray-700">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ __('etudiants.profil-prent') }}
                                    </p>
                                    <a wire:navigate class=" hover:underline dark:decoration-slate-50"  href="{{url(app()->getLocale().'/Parent/'.$etud->parent->id)}}">
                                            {{  app()->getLocale() == 'ar' ? $etud->parent->nom : $etud->parent->nomfr }} -
                                        <span dir="ltr">
                                            {{  chunk_split($etud->parent->telephone, 2, ' ') }}
                                        </span> 
                                    </a>
                                </div>
                                @if ($etud->ddn)
                                <div class="md:grid md:grid-cols-2  md:space-y-0 space-y-1 p-4 border-b text-gray-800 dark:text-gray-200 dark:border-gray-700">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ __('etudiants.profil-ddn') }}
                                    </p>
                                    <p>
                                        {{ $etud->ddn  }}  @if($etud->ldn) - {{ $etud->ldn  }}  @endif
                                    </p>
                                </div>
                                @endif
                                @if ($etud->nni)
                                <div class="md:grid md:grid-cols-2  md:space-y-0 space-y-1 p-4 border-b text-gray-800 dark:text-gray-200 dark:border-gray-700">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ __('etudiants.profil-nni') }}
                                    </p>
                                    <p>
                                        {{ $etud->nni  }}
                                    </p>
                                </div>
                                @endif
                                @if ($etud->nc)
                                <div class="md:grid md:grid-cols-2  md:space-y-0 space-y-1 p-4 border-b text-gray-800 dark:text-gray-200 dark:border-gray-700">
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ __('etudiants.profil-ns') }} (RIM)
                                    </p>
                                    <p>
                                        {{ $etud->nc  }}
                                    </p>
                                </div>
                                @endif
                            </div>
                        </div>
                
                    </div>
                    <div class=" lg:w-1/3 md:w-1/3 p-1 "> 
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

                            @can('dir')
                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etud->id.'/Badges') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 18.75h-9m9 0a3 3 0 0 1 3 3h-15a3 3 0 0 1 3-3m9 0v-3.375c0-.621-.503-1.125-1.125-1.125h-.871M7.5 18.75v-3.375c0-.621.504-1.125 1.125-1.125h.872m5.007 0H9.497m5.007 0a7.454 7.454 0 0 1-.982-3.172M9.497 14.25a7.454 7.454 0 0 0 .981-3.172M5.25 4.236c-.982.143-1.954.317-2.916.52A6.003 6.003 0 0 0 7.73 9.728M5.25 4.236V4.5c0 2.108.966 3.99 2.48 5.228M5.25 4.236V2.721C7.456 2.41 9.71 2.25 12 2.25c2.291 0 4.545.16 6.75.47v1.516M7.73 9.728a6.726 6.726 0 0 0 2.748 1.35m8.272-6.842V4.5c0 2.108-.966 3.99-2.48 5.228m2.48-5.492a46.32 46.32 0 0 1 2.916.52 6.003 6.003 0 0 1-5.395 4.972m0 0a6.726 6.726 0 0 1-2.749 1.35m0 0a6.772 6.772 0 0 1-3.044 0" />
                                      </svg>                                                                                                                  
                                </div>
                                <div>  
                                    {{ __('etudiants.badges') }}
                                </div>
                            </a>
                            @endcan
                           

                        

                        @cannot('parent')
                            <button wire:click="$dispatchTo('etud-semes','open',{ id: {{ $etud->id }} })"   class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
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

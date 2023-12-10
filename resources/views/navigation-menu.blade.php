<nav  x-data="{ open: false, attds: false,  jorns: false, etuds: false}" class="bg-white  dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="flex flex-col w-[16rem] h-screen shadow-sm  py-4 bg-white  dark:bg-gray-900 dark:border-gray-600">
        <div class="flex flex-col space-y-1 items-center justify-center">
            <x-application-mark  /> 
            <div>            
                <h2 class=" text-center font-semibold text-teal-600 dark:text-white">Drim Technologie</h2>
            </div>
        </div>     
        <div class="flex flex-col justify-between flex-1 mt-4 px-2 ">
            <nav class="flex flex-col space-y-1">

                <x-nav-link wire:navigate  href="{{url(app()->getLocale().'/dashboard')}}" :active="request()->routeIs('dashboard')">
                    <svg class="w-5 h-5 mx-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 11H5M19 11C20.1046 11 21 11.8954 21 13V19C21 20.1046 20.1046 21 19 21H5C3.89543 21 3 20.1046 3 19V13C3 11.8954 3.89543 11 5 11M19 11V9C19 7.89543 18.1046 7 17 7M5 11V9C5 7.89543 5.89543 7 7 7M7 7V5C7 3.89543 7.89543 3 9 3H15C16.1046 3 17 3.89543 17 5V7M7 7H17" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                    <span class="mx-4 font-medium"> {{ __('navlink.home') }}</span>
                </x-nav-link>


                @can('sur_or_dir')
                    <div  class="flex flex-col" >
                        <button class="flex justify-between items-center px-4 py-2 text-teal-800 dark:hover:bg-gray-800 rounded-md hover:bg-gray-100  dark:text-gray-400 transition"  x-on:click='etuds = !etuds ,attds = 0 ,jorns = 0'>
                            <div class="flex justify-between items-center w-full">
                                <div class="flex w-full ">
                                    <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                    </svg>
                                    <span class=" font-medium  ltr:pl-2  "> {{ __('navlink.etudiants') }}</span>
                                </div>
                                <div :class="etuds ? 'rotate-180 transition-all ' : 'transition-all rotate-0'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>                                  
                                </div> 
                            </div>
                            
                        </button>
                        <div class="rtl:pr-20  ltr:pl-20  py-2 flex flex-col space-y-2 dark:bg-gray-800  bg-gray-100 text-teal-800 dark:text-gray-200"  x-show="etuds" x-collapse>
                            <a wire:navigate href="{{url(app()->getLocale().'/Etudiants')}}"  class=" dark:hover:text-gray-50 hover:text-teal-900 hover:font-bold  w-full">
                                {{ __('navlink.etudiants') }}
                            </a>
                            <a wire:navigate href="{{url(app()->getLocale().'/Parents') }}" class=" dark:hover:text-gray-50 hover:text-teal-900 hover:font-bold  w-full">
                                {{ __('navlink.parent') }}
                            </a>
                        </div>
                    </div>
                @endcan

                @can('comps')
                    @cannot('admin')
                        <x-nav-link wire:navigate  href="{{url(app()->getLocale().'/Parents')}}" :active="request()->routeIs('Parents')">
                            <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>
                            <span class="mx-4 font-medium"> {{ __('navlink.parent') }}</span>
                        </x-nav-link>
                    @endcannot
                @endcan

                @can('sur_or_dir')
                    <div  class="flex flex-col" >
                        <button class="flex justify-between items-center px-4 py-2 text-teal-800 dark:hover:bg-gray-800 rounded-md hover:bg-gray-100  dark:text-gray-400 transition"  x-on:click='jorns = !jorns ,attds = 0, etuds = 0'>
                            <div class="flex justify-between items-center w-full">
                                <div class="flex w-full ">
                                    <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                    </svg>
                                    <span class=" font-medium  ltr:pl-2  "> {{ __('navlink.jorns') }}</span>
                                </div>
                                <div :class="jorns ? 'rotate-180 transition-all ' : 'transition-all rotate-0'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>                                  
                                </div> 
                            </div>
                            
                        </button>
                        <div class="rtl:pr-20  ltr:pl-20  py-2 flex flex-col space-y-2 dark:bg-gray-800  bg-gray-100 text-teal-800 dark:text-gray-200"  x-show="jorns" x-collapse>
                            <a wire:navigate  href="{{url(app()->getLocale().'/Jorns') }}" class=" dark:hover:text-gray-50 hover:text-teal-900 hover:font-bold  w-full">
                                {{ __('navlink.jorns') }}
                            </a>
                            @cannot('sur')
                            <a wire:navigate  href="{{url(app()->getLocale().'/Mats') }}" class=" dark:hover:text-gray-50 hover:text-teal-900 hover:font-bold  w-full">
                                {{ __('navlink.mats') }}
                            </a>
                            @endcannot
                           
                            <a wire:navigate href="{{url(app()->getLocale().'/Profs')}}" class=" dark:hover:text-gray-50 hover:text-teal-900  hover:font-bold  w-full">
                                {{ __('navlink.profs') }}
                            </a>
                            <a wire:navigate href="{{url(app()->getLocale().'/Classes')}}" class=" dark:hover:text-gray-50  hover:text-teal-900  hover:font-bold w-full">
                                {{ __('navlink.classes') }}
                            </a>
                        </div>
                    </div>
                @endcan

                @can('dir_or_prof')
                    <x-nav-link wire:navigate href="{{url(app()->getLocale().'/Result')}}"    :active="request()->routeIs('Result')" >
                        <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                        </svg>
                        <span class="mx-4 font-medium"> {{ __('navlink.result') }}</span>
                    </x-nav-link>
                @endcan

                @can('dir_or_comps')
                    @cannot('admin')
                        <x-nav-link wire:navigate href="{{url(app()->getLocale().'/Profs') }}" :active="request()->routeIs('Profs')">
                            <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                              </svg>                              
                            <span class="mx-4 font-medium">  {{ __('navlink.profs') }}</span>
                        </x-nav-link>
                    @endcannot
                @endcan

                @can('comps')
                        <x-nav-link wire:navigate href="{{url(app()->getLocale().'/Emps') }}" :active="request()->routeIs('Emps')">
                            <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <span class="mx-4 font-medium"> {{ __('navlink.emps') }}</span>
                        </x-nav-link>
                @endcan

                @can('sur_or_dir')
                    <div  class="flex flex-col" >
                        <button class="flex justify-between items-center px-4 py-2 text-teal-800 dark:hover:bg-gray-800 rounded-md hover:bg-gray-100  dark:text-gray-400 transition"  x-on:click="attds = !attds,jorns = 0">
                            <div class="flex justify-between items-center w-full">
                                <div class="flex w-full">
                                    <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.864 4.243A7.5 7.5 0 0119.5 10.5c0 2.92-.556 5.709-1.568 8.268M5.742 6.364A7.465 7.465 0 004.5 10.5a7.464 7.464 0 01-1.15 3.993m1.989 3.559A11.209 11.209 0 008.25 10.5a3.75 3.75 0 117.5 0c0 .527-.021 1.049-.064 1.565M12 10.5a14.94 14.94 0 01-3.6 9.75m6.633-4.596a18.666 18.666 0 01-2.485 5.33" />
                                    </svg> 
                                    <span class=" font-medium ltr:pl-2">{{ __('navlink.atdds') }}</span>
                                </div>
                                <div :class="attds ? 'rotate-180 transition-all ' : 'transition-all rotate-0'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                    </svg>                                  
                                </div> 
                            </div>
                            
                        </button>
                        <div class="pr-20  ltr:pl-16  py-2 flex flex-col space-y-2 dark:bg-gray-800  bg-gray-100 text-teal-800 dark:text-gray-200"  x-show="attds" x-collapse>
                            <a wire:navigate href="{{url(app()->getLocale().'/Attds/Classe') }}" class=" dark:hover:text-gray-50 hover:text-teal-900 hover:font-bold  w-full">
                                {{ __('navlink.atdds-class') }}
                        </a>
                        <a wire:navigate href="{{url(app()->getLocale().'/Atdds/Etuds') }}" class=" dark:hover:text-gray-50 hover:text-teal-900 hover:font-bold  w-full">
                                {{ __('navlink.atdds-etuds') }}
                        </a>
                        <a wire:navigate href="{{url(app()->getLocale().'/Atdds/Profs/') }}" class=" dark:hover:text-gray-50 hover:text-teal-900  hover:font-bold  w-full">
                                {{ __('navlink.atdds-profs') }}
                        </a>
                        <a wire:navigate href="{{url(app()->getLocale().'/Atdds/Emps/') }}" class=" dark:hover:text-gray-50  hover:text-teal-900  hover:font-bold w-full">
                                {{ __('navlink.atdds-emps') }} 
                        </a>
                        <a wire:navigate href="{{url(app()->getLocale().'/Notes') }}" class="  dark:hover:text-gray-50  hover:text-teal-900  hover:font-bold w-full">
                                {{ __('navlink.atdds-notes') }}
                        </a>
                        </div>
                    </div>
                @endcan



                @can('comps')
                    <x-nav-link wire:navigate href="{{url(app()->getLocale().'/Comps') }}" :active="request()->routeIs('Comps')">
                        <svg class="w-5 h-5 mx-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                        </svg>
                        
                        <span class="mx-4 font-medium">{{ __('navlink.comps') }}</span>
                    </x-nav-link>
                @endcan


            </nav>
        </div>
    </div>

</nav>

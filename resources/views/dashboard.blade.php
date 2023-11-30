<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('navlink.home') }}
        </h2>
    </x-slot>

    <div class="py-3">
        @can('sur_or_dir')    
            <div class="max-w-7xl flex flex-col space-y-2 mx-8 my-2">

                <div class=" my-3 mx-8 text-xl text-gray-800 dark:text-gray-50">
                    {{ __('navlink.ges-scol') }}
                </div>

                {{-- Menu 1  --}}
                <div class=" flex w-full justify-center ">
                                {{-- Étudiants --}}
                                <a wire:navigate href="{{url(app()->getLocale().'/Etudiants')}}"  class="mx-2 ">
                                    <div class=" w-60 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                                        <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                            <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                                <svg  fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                                </svg>                          
                                            </div>
                                            <div>
                                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ __('navlink.etudiants') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            {{-- ! Étudiants --}}
                
                            {{-- Jorns --}}
                                <a wire:navigate href="{{url(app()->getLocale().'/Jorns')}}"  class="mx-2 ">
                                    <div class="w-72 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                                        <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                            <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                                </svg>                                                       
                                            </div>
                                            <div>
                                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ __('navlink.jorns') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            {{-- ! Jorns --}}
                
                            {{-- Registre de présence --}}
                                <a wire:navigate href="{{url(app()->getLocale().'/Attds/Classe')}}"  class="mx-2 ">
                                    <div class=" w-80 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                                        <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                            <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0M3.124 7.5A8.969 8.969 0 015.292 3m13.416 0a8.969 8.969 0 012.168 4.5" />
                                                </svg>                                                                                                                                                                   
                                            </div>
                                            <div>
                                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ __('navlink.regst') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            {{-- ! Registre de présence --}}

                </div>
                {{-- ! Menu 1  --}}


                {{-- Menu 2  --}}
                <div class=" flex w-full justify-center ">
                    {{-- Notes --}}
                    <a wire:navigate href="{{url(app()->getLocale().'/Whatsapp')}}"  class="mx-2 ">
                        <div class=" w-80 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                            <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-text-50 " fill="currentColor" width="24" height="24" xmlns:v="https://vecta.io/nano">
                                        <path d="M.057 24l1.687-6.163C.703 16.033.156 13.988.157 11.891.16 5.335 5.495 0 12.05 0c3.181.001 6.167 1.24 8.413 3.488s3.481 5.236 3.48 8.414c-.003 6.557-5.338 11.892-11.893 11.892a11.9 11.9 0 0 1-5.688-1.448L.057 24zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347s-1.758-.868-2.031-.967-.47-.149-.669.149-.768.967-.941 1.165-.347.223-.644.074-1.255-.462-2.39-1.475c-.883-.788-1.48-1.761-1.653-2.059s-.018-.458.13-.606c.134-.133.297-.347.446-.521s.2-.296.3-.495.05-.372-.025-.521-.669-1.611-.916-2.206c-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074 2.095 3.2 5.076 4.487c.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413s.248-1.29.173-1.414z"></path>
                                      </svg>                                                                            
                                </div>
                                <div>
                                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                        {{ __('navlink.wh') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    {{-- ! Notes --}}

                    {{-- Resultat --}}
                    <a wire:navigate href="{{url(app()->getLocale().'/Result')}}"  class="mx-2 ">
                        <div class=" w-72 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                            <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 00.75-.75 2.25 2.25 0 00-.1-.664m-5.8 0A2.251 2.251 0 0113.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25zM6.75 12h.008v.008H6.75V12zm0 3h.008v.008H6.75V15zm0 3h.008v.008H6.75V18z" />
                                    </svg>                                                                                           
                                </div>
                                <div>
                                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                        {{ __('navlink.result') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    {{-- ! Resultat --}}

                    {{-- Clsses --}}
                    <a wire:navigate href="{{url(app()->getLocale().'/Classes')}}"  class="mx-2 ">
                        <div class=" w-60 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                            <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                    </svg>                                                                                             
                                </div>
                                <div>
                                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                        {{ __('navlink.classes') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                    {{-- ! Clsses --}}


                </div>
                {{-- ! Menu 2  --}}







            </div>
        @endcan

        @can('comps')
            <div class="max-w-7xl flex flex-col space-y-2 mx-8 mt-8">

                <div class=" my-3 mx-8 text-xl text-gray-800 dark:text-gray-50">
                    {{ __('navlink.comps') }}
                </div>

                {{-- Menu 1  --}}
                <div class=" flex w-full justify-center ">
                                {{-- Comps --}}
                                <a wire:navigate href="{{url(app()->getLocale().'/Comps')}}"  class="mx-2 ">
                                    <div class=" w-60 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                                        <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                            <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
                                                </svg>                                                                       
                                            </div>
                                            <div>
                                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ __('navlink.comps') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            {{-- ! Comps --}}
                
                            {{-- Entreprises --}}
                                <a wire:navigate href="{{url(app()->getLocale().'/Entreprises')}}"  class="mx-2 ">
                                    <div class="w-72 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                                        <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                            <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                                                </svg>                                                                                                     
                                            </div>
                                            <div>
                                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ __('navlink.ents') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            {{-- ! Entreprises --}}
                
                            {{-- Detts --}}
                                <a wire:navigate href="{{url(app()->getLocale().'/Dettes')}}"  class="mx-2 ">
                                    <div class=" w-80 bg-white dark:bg-gray-800  shadow-md rounded-lg">
                                        <div class="flex items-center p-6 bg-white rounded-lg  dark:bg-gray-800">
                                            <div class=" mx-3 p-3 mr-4 text-teal-700 bg-teal-100 rounded-full dark:text-orange-100 dark:bg-teal-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                                </svg>                                                                                                                                                                                                                
                                            </div>
                                            <div>
                                                <p class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                                    {{ __('navlink.detts') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            {{-- ! Detts --}}

                </div>
                {{-- ! Menu 1  --}}







            </div>
        @endcan



    </div>
</x-app-layout>

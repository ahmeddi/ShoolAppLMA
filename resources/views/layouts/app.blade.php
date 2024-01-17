<!DOCTYPE html>
<html 
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
        lang="{{ app()->getLocale() }}"
        x-cloak
        x-data="{darkMode: localStorage.getItem('dark') === 'true',dir:'rtl', userDropdownOpen: false}"
        x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
        x-bind:class="{'dark': darkMode}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap');
        </style>

        <style>
            #nprogress .bar {
                background: #0d9488 !important;
            }

            #nprogress .spinner-icon {
            border-top-color: #0d9488 !important;
            border-left-color: #0d9488 !important;
            }
         </style>




        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body style="print-color-adjust: exact;"  class="bg-gray-200 dark:bg-gray-700  font-sans antialiased flex  relative "
            x-data="{
                printDiv() {
                    window.print();           
                },
                printA5NoMargin() {
                    const style = document.createElement('style');
                    style.textContent = `
                        @page {
                            size: 148mm 210mm;
                            margin: 0;
                        }
                    `;
                    document.head.appendChild(style);
                    
                    window.print();
                    
                    // Remove the style after printing to reset margins
                    style.remove();
                },
                jorn() {
                    const style = document.createElement('style');
                    style.textContent = `
                        @page {
                            size: A4 landscape;
                            margin: 0;
                        }
                    `;
                    document.head.appendChild(style);
                    
                    window.print();
                    
                    // Remove the style after printing to reset margins
                    style.remove();
                },
                list() {
                    const style = document.createElement('style');
                    style.textContent = `
                        @page {
                            size: A4 ;
                            margin: 0;
                        }
                    `;
                    document.head.appendChild(style);
                    
                    window.print();
                    
                    // Remove the style after printing to reset margins
                    style.remove();
                },
            }"
            class="font-sans antialiased">
            @cannot('parent')
                @cannot('prof')
                <div class="h-screen sticky   border-0  top-0 print:hidden">@livewire('navigation-menu')</div>
                @endcannot
            @endcannot
        <div class=" relative h-min-screen w-full bg-gray-200 dark:bg-gray-700 ">

            {{-- <div class=" absolute top-12  right-1/2  z-50">
                @livewire('notification')
            </div> --}}


            <!-- Page Heading -->
            @if (isset($header))
            <header class=" z-40 border-0 shadow sticky top-0 print:hidden">
                <div class="bg-white  text-gray-700 dark:text-gray-50 dark:bg-gray-900 py-4 px-6 ">
                    <h2 class="font-semibold text-xl leading-tight w-full flex  items-center justify-between">
                    <div>
                        {{ $header }}
                    </div>
                    <div class="flex flex-row-reverse items-center">
                        <div class=" w-full h-full p-2 flex justify-center items-center">
                            {{-- Dark Mode --}}
                            <button  x-cloak x-on:click="darkMode = !darkMode;" class="bg-gray-500 dark:bg-gray-50  h-8 w-8 p-1 shrink-0  flex rounded-full justify-center items-center align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" class="fill-gray-100 dark:fill-gray-900 h-6 w-6" >
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                            <!-- User Dropdown -->
                                <div class="relative inline-block">
                                    <!-- Dropdown Toggle Button -->
                                    <button
                                    type="button"
                                    class="inline-flex items-center justify-center rounded border border-gray-300 bg-white px-3 py-2 text-sm font-semibold leading-5 text-gray-800 shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                                    id="tk-dropdown-layouts-user"
                                    aria-haspopup="true"
                                    x-bind:aria-expanded="userDropdownOpen"
                                    x-on:click="userDropdownOpen = true"
                                    >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="hi-solid hi-user-circle inline-block h-5 w-5 sm:hidden"
                                    >
                                        <path
                                        fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-5.5-2.5a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0zM10 12a5.99 5.99 0 00-4.793 2.39A6.483 6.483 0 0010 16.5a6.483 6.483 0 004.793-2.11A5.99 5.99 0 0010 12z"
                                        clip-rule="evenodd"
                                        />
                                    </svg>
                                    <span class="hidden sm:inline">{{  auth()->user() ? auth()->user()->name : ''}}</span>
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20"
                                        fill="currentColor"
                                        class="hi-solid hi-chevron-down ms-1 hidden h-5 w-5 opacity-50 sm:inline-block"
                                    >
                                        <path
                                        fill-rule="evenodd"
                                        d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                        clip-rule="evenodd"
                                        />
                                    </svg>
                                    </button>
                                    <!-- END Dropdown Toggle Button -->

                                    <!-- Dropdown -->
                                    <div
                                    x-cloak
                                    x-show="userDropdownOpen"
                                    x-transition:enter="transition ease-out duration-150"
                                    x-transition:enter-start="opacity-0 scale-75"
                                    x-transition:enter-end="opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-100"
                                    x-transition:leave-start="opacity-100 scale-100"
                                    x-transition:leave-end="opacity-0 scale-75"
                                    x-on:click.outside="userDropdownOpen = false"
                                    role="menu"
                                    aria-labelledby="tk-dropdown-layouts-user"
                                    class="z-1 absolute end-0 mt-2 w-48 rounded shadow-xl ltr:origin-top-right rtl:origin-top-left"
                                    >
                                    <div
                                        class="divide-y w-full divide-gray-100 rounded bg-white ring-1 ring-black ring-opacity-5 dark:divide-gray-700 dark:bg-gray-900 dark:ring-gray-700"
                                    >
                                    @can('prof')
                                        <div class="space-y-1 p-2 w-full justify-center text-center">
                                            <a
                                                x-on:click="userDropdownOpen = false,mobileSidebarOpen = false" 
                                                role="menuitem"
                                                wire:navigate  href='/' 
                                                class="flex w-full justify-center text-center items-center gap-2 rounded px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100"
                                            >
                                                <span>{{ __('navlink.home') }}</span>
                                            </a>
                                        </div>
                                    @endcan

                                    @can('parent')
                                        @php
                                            $etuds = [];
                                            $parentId = auth()->user()->parent_id;
                                            $parent = App\Models\Parentt::find($parentId);

                                            if ($parent) {
                                                $etuds = $parent->etuds;
                                            }
                                        @endphp

                                        <div class="space-y-1 p-1 w-full justify-center text-center">

                                            @forelse ($etuds as $etud)
                                                <a
                                                    x-on:click="userDropdownOpen = false,mobileSidebarOpen = false" 
                                                    role="menuitem"
                                                    wire:navigate href="{{url(app()->getLocale().'/Etudiant/'.$etud->id ) }}" 
                                                    class="flex w-full justify-center text-center items-center gap-2 rounded px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100"
                                                >
                                                    <span class=" flex flex-col">
                                                        <span>{{ $etud->nom }}</span>
                                                        <span>{{ $etud->nomfr }}</span>
                                                    </span>
                                                </a>
                                            @empty 
                                            @endforelse

                                        </div>
                                    @endcan
                                    <div
                                    class="flex w-full justify-center text-center items-center gap-2 rounded px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100"
                                        >
                                    <span   class="w-full"> @livewire('language-switcher')</span>
                                    </div>
                                    
                                    @can('admin')
                                        <div class="space-y-1 p-2 w-full justify-center text-center">
                                    
                                        <a
                                            x-on:click="userDropdownOpen = false,mobileSidebarOpen = false" 
                                            role="menuitem"
                                            wire:navigate href="{{url(app()->getLocale().'/Utilisateurs') }}" 
                                            class="flex w-full justify-center text-center items-center gap-2 rounded px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100"
                                        >
                                            <span>{{ __('navlink.users') }}</span>
                                        </a>
                                        </div>
                                        <div class="space-y-1 p-2 w-full justify-center text-center">
                                        <a
                                            x-on:click="userDropdownOpen = false,mobileSidebarOpen = false" 
                                            wire:navigate href="{{url(app()->getLocale().'/Parametres') }}"
                                            class="flex  w-full justify-center text-center items-center gap-2 rounded px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100"
                                        >
                                            <span> {{ __('navlink.parametres') }}</span>
                                        </a> 
                                        </div>
                                    @endcan
                                        <div class="space-y-1 p-2 w-full justify-center text-center">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button
                                            class="flex justify-center text-center w-full items-center gap-2 rounded px-3 py-2  text-sm font-medium text-gray-600 hover:bg-gray-100 hover:text-gray-700 focus:bg-gray-100 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 dark:focus:bg-gray-800 dark:focus:text-gray-100"
                                            >
                                            <span>{{ __('navlink.logout') }}</span>
                                            </button>
                                        </form>
                                        </div>
                                    </div>
                                    </div>
                                    <!-- END Dropdown -->
                                </div>
                            <!-- END User Dropdown -->
                    </div>       
                    </h2>  
                </div>
            </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>

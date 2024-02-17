<!DOCTYPE html>
<html 
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
        lang="{{ app()->getLocale() }}"
        x-cloak
        x-data="{darkMode:  localStorage.getItem('dark') === 'true',dir:'rtl',
        mobileSidebarOpen:false,
        desktopSidebarOpen:true,
        userDropdownOpen: false }"
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
                height: 5px !important;
            }

            #nprogress .spinner-icon {
            border-top-color: #0d9488 !important;
            border-left-color: #0d9488 !important;
            display: none;
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('scripts')


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
            <div
            id="page-container"
            class="mx-auto flex min-h-screen w-full min-w-[320px] flex-col bg-gray-200 transition-all duration-300 ease-out dark:bg-gray-700 dark:text-gray-200 lg:ps-64"
            x-bind:class="{ 'lg:ps-64': desktopSidebarOpen }"
        >
            <!-- Page Sidebar -->
            <nav
            id="page-sidebar"
            class="fixed print:hidden bottom-0 start-0 top-0 z-50 flex h-full w-full flex-col border-gray-200 bg-white transition-transform duration-300 ease-out ltr:border-r rtl:border-l dark:border-gray-700/75 dark:bg-gray-900 lg:w-64"
            x-bind:class="{
                'ltr:-translate-x-full rtl:translate-x-full': !mobileSidebarOpen,
                'translate-x-0': mobileSidebarOpen,
                'ltr:lg:-translate-x-full rtl:lg:translate-x-full': !desktopSidebarOpen,
                'ltr:lg:translate-x-0 rtl:lg:translate-x-0': desktopSidebarOpen,
            }"
            aria-label="Main Sidebar Navigation"
            >
            <!-- Sidebar Header -->
            <div class=" print:hidden flex h-12 w-full flex-none items-center  justify-between px-4">
                <!-- Brand -->
                
                <div class="w-full flex items-center gap-3 lg:gap-0 space-x-3 lg:justify-between">
                    <div>
                        <div
                            class="group mx-4 lg:mx-0 inline-flex items-center gap-2 font-semibold text-gray-800  dark:text-gray-200 "
                            >
                            <span>Drim Technologie</span>
                        </div>
                    </div>
                    <div class=" h-full ">
                        <div class=" h-full flex  items-center">
                            <!-- Dark Mode Toggle -->
                            <button
                            type="button"
                            class="inline-flex items-center justify-center leading-5 text-gray-800 hover:text-gray-600 focus:outline-none active:text-gray-800 dark:text-gray-200 dark:hover:text-gray-300 dark:active:text-gray-200"
                            x-on:click="darkMode = !darkMode"
                            >
                            <svg
                            x-show="!darkMode"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="hi-outline hi-moon inline-block h-5 w-5"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z"
                            />
                            </svg>
                            <svg
                            x-cloak
                            x-show="darkMode"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="hi-outline hi-sun inline-block h-5 w-5"
                            >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                            />
                            </svg>
                            </button>
                            <!-- END Dark Mode Toggle -->
                        </div>
                    </div>
                    
                </div>

                <!-- END Brand -->

                <!-- Extra Actions -->
                <div class="flex items-center">
               

                <!-- Close Sidebar on Mobile -->
                {{-- <x-Nav.Close/> --}}
                <div>
                    <button
                        type="button"
                        class="ms-3 inline-flex items-center justify-center leading-5 
                        text-dark-600 
                        hover:text-danger-600 
                        focus:outline-none 
                        active:text-danger-800 dark:text-dark-200 
                        dark:hover:text-danger-300 
                        dark:active:text-danger-200 
                        lg:hidden"
                        x-on:click="mobileSidebarOpen = false"
                    >
                        <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="hi-solid hi-x-mark inline-block h-5 w-5"
                        >
                            <path stroke-linecap="round"stroke-linejoin="round"d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>

                <div>

                </div>
                <!-- END Close Sidebar on Mobile -->
                </div>
                <!-- END Extra Actions -->
            </div>
            <!-- END Sidebar Header -->

            <!-- Sidebar Navigation -->
            <div class="overflow-y-auto print:hidden">
                <div class="w-full py-4">
                <nav class="space-y-1">
                    @livewire('navigation-menu')
                </nav>
                </div>
            </div>
            <!-- END Sidebar Navigation -->
            </nav>
            <!-- Page Sidebar -->

            <!-- Page Header -->
            <header
            id="page-header"
            class="fixed print:hidden end-0 start-0 top-0 z-30 flex h-16 flex-none items-center bg-white shadow-sm transition-all duration-300 ease-out dark:bg-gray-900  lg:ps-64"
            x-bind:class="{ 'lg:ps-64': desktopSidebarOpen }"
            >

           
            <div
                class="mx-auto flex w-full max-w-7xl justify-between px-4 lg:px-8 bg-background/95 supports-[backdrop-filter]:bg-background/60"
            >
                <!-- Left Section -->
                <div class="flex items-center">
                <!-- Toggle Sidebar on Mobile -->
                <div class="me-2 lg:hidden">
                    <button
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded border border-gray-300 bg-white px-3 py-2 font-semibold leading-6 text-gray-800 shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    x-on:click="mobileSidebarOpen = true"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hi-solid hi-menu-alt-1 inline-block h-5 w-5"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </button>
                </div>
                <!-- END Toggle Sidebar on Mobile -->

                <!-- Toggle Sidebar on Desktop -->
                <div class="hidden lg:block">
                    <button
                    type="button"
                    class="inline-flex items-center justify-center gap-2 rounded border border-gray-300 bg-white px-3 py-2 font-semibold leading-6 text-gray-800 shadow-sm hover:border-gray-300 hover:bg-gray-100 hover:text-gray-800 hover:shadow focus:outline-none focus:ring focus:ring-gray-500 focus:ring-opacity-25 active:border-white active:bg-white active:shadow-none dark:border-gray-700/75 dark:bg-gray-900 dark:text-gray-200 dark:hover:border-gray-700 dark:hover:bg-gray-800 dark:hover:text-gray-200 dark:focus:ring-gray-700 dark:active:border-gray-900 dark:active:bg-gray-900"
                    x-on:click="desktopSidebarOpen = !desktopSidebarOpen"
                    >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="hi-solid hi-menu-alt-1 inline-block h-5 w-5"
                    >
                        <path
                        fill-rule="evenodd"
                        d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"
                        clip-rule="evenodd"
                        />
                    </svg>
                    </button>
                </div>
                <!-- END Toggle Sidebar on Desktop -->
                </div>
                <!-- END Left Section -->

                <!-- Main Section -->
                <div class="flex items-center">
                   
                
                </div>
                <div class="max-w-7xl  mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                   <div class="text-primary-500">
                        {{ $header }} 
                    </div> 
                </div>
                <!-- END Main Section -->

                <!-- Right Section -->
                <div class="flex items-center gap-2">
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
                    <span class="w-full"> @livewire('language-switcher')</span>
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
                <!-- END Right Section -->
            </div>

            
            </header>
            <!-- END Page Header -->

            <!-- Page Content -->
            <main id="page-content" class="flex max-w-full flex-auto flex-col pt-16">

                {{ $slot }}

            <!-- END Page Section -->
            </main>
            <!-- END Page Content -->

        </div>
        <!-- END Page Container -->
        </div>

        @stack('modals')


        @livewireScripts
        <!-- ... (other parts of your code) ... -->

        <!-- ... (other parts of your code) ... -->

    </body>
</html>

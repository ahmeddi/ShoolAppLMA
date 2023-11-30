<!DOCTYPE html>
<html 
        dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}"
        lang="{{ app()->getLocale() }}"
        x-cloak
        x-data="{darkMode: localStorage.getItem('dark') === 'true',dir:'rtl'}"
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
                    <div class="h-screen sticky   border-0  top-0 print:hidden">@livewire('navigation-menu')</div>
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
                                                        {{-- Dark Mode --}}
                            <button  x-cloak x-on:click="darkMode = !darkMode;" class="bg-gray-500 dark:bg-gray-50  h-8 w-8 p-1 shrink-0  flex rounded-full justify-center items-center align-middle">
                                <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" class="fill-gray-100 dark:fill-gray-900 h-6 w-6" >
                                    <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div class="mx-6">
                                @livewire('language-switcher')
                            </div>
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

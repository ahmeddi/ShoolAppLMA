<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('الحضور و الغياب') }}
        </h2>
    </x-slot>

    <div class="py-2 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="w-full flex  justify-between my-2 ">
                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md  h-24 w-56 ">
                    <a href="/Atdds/Etuds/"  class="h-full w-full">
                        <div class="  w-full  flex  ">
                            <div class=" h-full  w-full">
                                <div class=" font-bold text-md w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize pt-2 "> {{  "الطلاب" }}</div>
                                <div class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                      </svg>                                                                           
                                </div>
                            </div>
                        </div>
                    </a> 
                </div>
        
                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md  h-24 w-56 ">
                    <a href="/Atdds/Profs/"  class="h-full w-full">
                        <div class="  w-full  flex  ">
                            <div class=" h-full  w-full">
                                <div class=" font-bold text-md w-full text-gray-500 dark:text-gray-300 flex items-center justify-center  pt-2 capitalize"> {{ 'الاساتذة' }}</div>
                                <div class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                    </svg>                                          
                                </div>
                            </div>
                        </div>
                    </a> 
                </div>  
        
                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md  h-24 w-56 ">
                    <a href="/Atdds/Emps/"  class="h-full w-full">
                        <div  class="h-full w-full">
                            <div class="  w-full  flex  ">
                                <div class=" h-full  w-full">
                                        <div class=" font-bold text-md w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize  pt-2 "> {{ 'الموظفين' }}</div>
                                        <div class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                              </svg>                                                                                                                                    
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                    </a> 
                </div> 

                <div class="bg-white dark:bg-gray-900 rounded-md shadow-md  h-24 w-56 ">
                    <a href="/Notes"  class="h-full w-full">
                        <div  class="h-full w-full">
                            <div class="  w-full  flex  ">
                                <div class=" h-full  w-full">
                                        <div class=" font-bold text-md w-full text-gray-500 dark:text-gray-300 flex items-center justify-center capitalize  pt-2 "> {{ 'الملاحظات' }}</div>
                                        <div class="flex flex-col items-center pt-1  w-full h-full text-3xl text-gray-800 dark:text-gray-200 font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 7.5V6.108c0-1.135.845-2.098 1.976-2.192.373-.03.748-.057 1.123-.08M15.75 18H18a2.25 2.25 0 002.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 00-1.123-.08M15.75 18.75v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5A3.375 3.375 0 006.375 7.5H5.25m11.9-3.664A2.251 2.251 0 0015 2.25h-1.5a2.251 2.251 0 00-2.15 1.586m5.8 0c.065.21.1.433.1.664v.75h-6V4.5c0-.231.035-.454.1-.664M6.75 7.5H4.875c-.621 0-1.125.504-1.125 1.125v12c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V16.5a9 9 0 00-9-9z" />
                                              </svg>
                                                                                                                                                                                 
                                        </div>
                                
                                </div>
                            </div>
                        </div>
                    </a> 
                </div> 
            </div>

    </div>
</x-app-layout>
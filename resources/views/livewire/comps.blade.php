<div class="max-w-7xl mx-auto px-4">
    <div wire:loading.attr="disabled" class=" my-2 flex w-full justify-end w ">
        <x-Dropdown.dropdown-menu :$ranges :$selectedRange :$rangeName :$customRangeStart :$customRangeEnd/>  
    </div> 


    <div class=" border border-gray-200 dark:border-gray-700 shadow grid grid-cols-1 divide-x-0 lg:divide-x divide-y lg:divide-y-0  md:divide-x md:divide-y  divide-gray-200 dark:divide-gray-500 rtl:divide-x-reverse sm:grid-cols-2 lg:grid-cols-4 rounded-md overflow-hidden">
        <x-My.card :label="__('compt.fraisS')" :montant="$recet" :exp="$frais" :border="1" :url="'/Dettes/Parents'" />
        <x-My.card :label="__('compt.don')" :montant="$dettes" :exp="0" :border="1" :url="'/Dettes/Prets'" />
        <x-My.card :label="__('compt.sal')" :montant="$sal" :exp="$hon" :border="0" :url="'/Salaires'" />
        <x-My.card :label="__('compt.dep')" :montant="$depances" :exp="0" :border="0" :url="'/Depenses'" />
    </div>
    

    <div>
        <div class="px-8 bg-white dark:bg-gray-900 p-3 w-full h-12 my-2 rounded-md shadow-md align-middle flex items-center">
            <div class="  text-lg mx-4 text-gray-700 dark:text-gray-300 flex items-center align-middle justify-center capitalize "> {{ __('compt.solde') }}:</div>
            <div  dir="ltr" class="mx-4 flex flex-col items-center   text-lg text-gray-800 align-middle dark:text-gray-200 font-bold"> {{ number_format($comps, 0, '.', ' ') }} </div>
        </div>
    </div>

        <!-- component -->
    <!-- This is an example component -->
    {{-- <div class=" w-full ">
        
        <div class="max-w-4xl  bg-white w-full rounded-lg shadow-xl">
            <div class="p-4 border-b">
                <h2 class="text-2xl ">
                    Applicant Information
                </h2>
                <p class="text-sm text-gray-500">
                    Personal details and application. 
                </p>
            </div>
            <div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Full name
                    </p>
                    <p>
                        Jane Doe
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Application for
                    </p>
                    <p>
                        Product Manager
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Email Address
                    </p>
                    <p>
                        Janedoe@gmail.com
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        Salary
                    </p>
                    <p>
                        $ 12000
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4 border-b">
                    <p class="text-gray-600">
                        About
                    </p>
                    <p>
                        Fugiat ipsum ipsum deserunt culpa aute sint do nostrud anim incididunt cillum culpa consequat. Excepteur qui ipsum aliquip consequat sint. Sit id mollit nulla mollit nostrud in ea officia proident. Irure nostrud pariatur mollit ad adipisicing reprehenderit deserunt qui eu. 
                    </p>
                </div>
                <div class="md:grid md:grid-cols-2 hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                    <p class="text-gray-600">
                        Attachments
                    </p>
                    <div class="space-y-2">
                        <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                            <div class="space-x-2 truncate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                                <span>
                                    resume_for_manager.pdf
                                </span>
                            </div>
                            <a href="#" class="text-purple-700 hover:underline">
                                Download
                            </a>
                        </div>

                        <div class="border-2 flex items-center p-2 rounded justify-between space-x-2">
                            <div class="space-x-2 truncate">
                                <svg xmlns="http://www.w3.org/2000/svg" class="fill-current inline text-gray-500" width="24" height="24" viewBox="0 0 24 24"><path d="M17 5v12c0 2.757-2.243 5-5 5s-5-2.243-5-5v-12c0-1.654 1.346-3 3-3s3 1.346 3 3v9c0 .551-.449 1-1 1s-1-.449-1-1v-8h-2v8c0 1.657 1.343 3 3 3s3-1.343 3-3v-9c0-2.761-2.239-5-5-5s-5 2.239-5 5v12c0 3.866 3.134 7 7 7s7-3.134 7-7v-12h-2z"/></svg>
                                <span>
                                    resume_for_manager.pdf
                                </span>
                            </div>
                            <a href="#" class="text-purple-700 hover:underline">
                                Download
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
    
</div>
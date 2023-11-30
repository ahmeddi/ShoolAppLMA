<div  class="" class="flex m-3 h-full space-x-2  ">
    <div class=" relative w-full h-full  p-2  ">
        <div class="w-full  ">
            <div class="flex p-2 w-auto h-full  justify-center items-center">

                <div class="w-60 h-full flex justify-center items-center">
                    <div class="flex justify-center items-center bg-teal-100 dark:bg-teal-900/70 rounded-lg text-left overflow-hidden  w-48 mx-3 ">
                        <div class=" p-4">
                            <div class="flex justify-center">
                                <div class="text-center ">
                                    <h3 class="text-base leading-6 font-medium text-teal-600 dark:text-teal-300">{{ __('compt.solde') }}</h3>
                                    <p dir="ltr" class="text-xl font-bold text-teal-800 dark:text-teal-100">{{ number_format($sold, 0, '.', ' ') }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex w-full  justify-between text-teal-900">
                    <div class=" w-full p-3">
                        <div class="w-full flex flex-col space-y-1">


                            <div class="w-full mx-2 mb-4 flex text-xl  font-bold dark:text-teal-50">
                                <div>{{ $entreprise->nom  }} </div>
                            </div>

                            <table>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('ent.tel') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $entreprise->telephone  }} - {{ $entreprise->telephone2 }}</div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-fit">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('ent.email') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $entreprise->email  }} </div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('ent.wh') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $entreprise->whatsapp  }} </div>

                                    </td>
                                </tr>
                            </table>
    
                        </div>
                        <div>
    
                        </div>
    
                    </div>
                    <div class=" w-80 p-1 "> 
                        <button  wire:click="$dispatch('edit',{id: {{ $entreprise->id }}})" class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                  </svg>
                                  
                            </div>
                            <div> 
                                {{ __('ent.edit') }}
                            </div>
                        </button>

                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

<div  class="" class="flex m-3 h-full space-x-2  ">
    <div class=" relative w-full h-full  p-2  ">
        <div class="w-full  ">
            <div class="flex p-2 w-auto ">
                <div class=" w-40 ">
                    {{-- <button wire:click="$dispatch('pic')" class=" relative flex justify-center object-cover items-center w-full h-36 mt-2  rounded-full overflow-hidden bg-gray-200 dark:bg-gray-600">
                        <div class=" absolute bg-gray-600/50 dark:bg-gray-200/50 w-full h-full opacity-0 hover:opacity-100">
                            <div class="w-full h-2/3"></div>
                            <div class=" text-sm font-semibold h-1/3 w-full bg-gray-900/50 dark:bg-gray-700/50 text-center pt-2 text-white"> {{ __('etudiants.profil-photo') }}</div>
                        </div>
                        @if ($emp->image)
                            <img wire:model='image' src="{{ asset('storage/'.$emp->image) }}" class="h-full w-full object-cover "    />
                        @else --}}
                            <svg xmlns="http://www.w3.org/2000/svg" class=" w-full text-gray-200 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                            </svg>
                        {{-- @endif
                    </button> --}}

                </div>
                <div class="flex w-full  justify-between text-teal-900">
                    <div class=" w-full p-3">
                        <div class="w-full flex flex-col space-y-1">

                            <div class="w-full mx-2 mb-4 flex text-xl  font-bold dark:text-teal-50">
                                <div>{{ $emp->nom  }} - {{ $emp->nomfr }}</div>
                            </div>

                            <table>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('emp.tel') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $emp->tel1  }} - {{ $emp->tel2 }}</div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('emp.nni') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $emp->nni  }} </div>

                                    </td>
                                </tr>
                                <tr class="py-1 my-1">
                                    <td class="w-2/12">                                                                                 
                                            <div  class=" text-sm font-semibold dark:text-teal-100 ">
                                                {{ __('emp.pos') }}:
                                            </div>    
                                    </td>
                                    <td class="w-fit dark:text-teal-100 font-bold flex justify-center items-center">
                                        <div class=" dark:text-teal-100">{{ $emp->post  }} </div>

                                    </td>
                                </tr>
                            </table>
    
                        </div>
                        <div>
    
                        </div>
    
                    </div>
                    <div class=" w-1/3 p-1 "> 
                        @can('dir')
                            <button  wire:click="$dispatch('open',{id: {{ $emp->id }}})" class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                    </svg>
                                    
                                </div>
                                <div> 
                                    {{ __('emp.profil-edit') }}
                                </div>
                            </button>
                        @endcan
                      
                        <a wire:navigate  href="{{url(app()->getLocale().'/Emp'.'/'.$emp->id.'/Att') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                  </svg>
                                                                         
                            </div>
                            <div> 
                                {{ __('emp.profil-pres') }}
                            </div>
                        </a>

                        <a wire:navigate.hover href="{{url(app()->getLocale().'/Emp'.'/'.$emp->id.'/Compt') }}" class="flex bg-teal-500 text-teal-50 p-2 rounded my-2 ">
                            <div class="mx-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                  </svg>                                        
                            </div>
                            <div>  
                                {{ __('emp.profil-comps') }}
                            </div>
                        </a>

                        @can('admin')
                            <button wire:click="$dispatch('del',{ id: {{ $emp->id }} })"   class="flex mb-2 bg-red-500 hover:bg-red-700 text-red-50 p-2 rounded w-full ">
                                <div class="mx-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>                                                                                                               
                                </div>
                                <div>  
                                    {{ __('emp.profil-del') }}
                                </div>
                            </button>
                        @endcan

                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

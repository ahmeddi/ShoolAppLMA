<div class="w-fit">
    <div class=" m-2">
        <div  class="flex space-x-8 justify-between  text-center text-gray-500 my-2 ">
            <div class="flex ">
                <div> <button  @class(['days','daysselceted' => $t_month,])   class="days " wire:click="thisMonth" >{{ __('calandar.month') }}</button></div> 
                <div> <button  @class(['days','daysselceted' => $p_month,]) class="days" wire:click="pastMonth" > {{ __('calandar.pastM') }} </button> </div>
                @cannot('parent')
                <div> <button  @class(['days','daysselceted' => $t_week,]) class="days " wire:click="thisWeek" >  {{ __('calandar.week') }}</button> </div> 
                @endcannot
                <div> <button  @class(['days','daysselceted' => $all,]) class="days " wire:click="alls" >  {{ __('calandar.tous') }}</button> </div> 
            </div>

            @cannot('parent')
                <div class="space-x-3 flex justify-around   ">
                    <input wire:model='day1'  class="h-10 w-54 inputs ml-2" type="date" name="randday"    />
                    <input wire:model='day2'  class="h-10 w-54 inputs ml-2" type="date" name="randday"    />
                    <button wire:click='randday' class="relative focus:outline-none bg-teal-500 hover:bg-teal-700 dark:bg-gray-100 dark:hover:bg-gray-200 w-12 h-10 rounded-md">
                                <div class=" absolute top-2.5 left-3.5">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-white dark:text-gray-900 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                    </button> 
                </div>
            @endcannot
            
        </div> 
    </div>  

    @can('dir')
        <div class= "flex justify-between my-3">
            <button wire:click="$dispatch('opens')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                {{ __('notes.add') }}
            </button>
        </div>
    @endcan
    

    <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100 dark:bg-gray-800  ">
        <tr class=" rtl:text-right ltr:text-left  items-center w-full">
            <th scope="col" class="px-2 lg:px-6 md:px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('notes.son') }}
           </th>
            <th scope="col" class="px-2 lg:px-6 md:px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                 {{ __('notes.note') }}
            </th>
            <th scope="col" class="px-2 lg:px-6 md:px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('notes.date') }}
            </th>
            <th scope="col" class="px-2 lg:px-6 md:px-6 py-3  sr-only text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                {{ __('notes.edit') }}
            </th>
        </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
                @forelse ($notes as $note)
                    <tr class="h-5  items-center w-full ">
                        <td class="px-2 lg:px-6 md:px-6 py-2 ">
                            <div class=" lg:text-sm md:text-sm text-xs  font-semibold text-gray-900 dark:text-gray-200">
                                      {{ $note['prof']   }}
                            </div>
                        </td>
                        <td class="px-2 lg:px-6 md:px-6 py-2">
                            <div class=" lg:text-sm md:text-sm text-xs font-semibold text-gray-900 dark:text-gray-200">
                                     {{ $note['titre']   }} 
                            </div>
                        </td>
                        <td class="px-2 lg:px-6 md:px-6 py-2">
                            <div class=" lg:text-sm md:text-sm text-xs font-semibold text-gray-900 dark:text-gray-200">
                                     {{ $note['date']   }} 
                            </div>
                        </td>
                        <td class="flex space-x-2 py-2 px-2 h-full items-center">
                            <div wire:loading >
                                <div role="status ">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-teal-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div wire:loading.remove>
                                @can('dir')
                                    @if($note['wh'] == 1)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-green-600 dark:text-green-300 w-6 h-6">
                                            <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                          </svg>
                                    @else
                                        <button  wire:click="$dispatch('wh',{ id: {{ $note['id'] }} })" class=" text-green-600 dark:text-gray-100 ">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                              </svg>
                                        </button>     
                                    @endif
                                @endcan
                            </div>  
                            <button wire:click="$dispatch('view',{ id: {{ $note['id'] }} })" class=" text-teal-500 dark:text-teal-200  hover:text-teal-900 dark:hover:text-teal-50 p-1" " >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                  </svg>                                                                                                                     
                            </button>
                            @can('dir')
                                <div class="mx-4">
                                    <button   wire:click="$dispatch('edit',{ id: {{ $note['id'] }} })">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" stroke-teal-700 dark:stroke-teal-300 w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg>                                                                               
                                    </button>
                                </div>    
                                <div>
                                    <button  wire:click="$dispatch('dlt',{ id: {{ $note['id'] }} })" class=" stroke-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-600 dark:stroke-red-400 w-5 h-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>                                                                               
                                    </button>
                                </div>
                            @endcan
                                                            
                        </td>
                    </tr>
                @empty
                @endforelse

  
        </tbody>
    </table>

</div>
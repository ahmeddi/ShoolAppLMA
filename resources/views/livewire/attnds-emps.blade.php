<div class="w-full h-full px-2  ">
     

    <div class= "flex justify-between my-3">
        <div class=" w-full flex my-2 justify-between items-center px-4">
            <div class= "flex justify-between my-1">
                <button wire:click="$dispatch('open')" class='focus:outline-none px-4 py-2 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                    {{ __('att.add') }}
                </button>
            </div>    
            <div>
                <x-Dropdown.dropdown-menu :$ranges :$selectedRange :$rangeName :$customRangeStart :$customRangeEnd/> 
            </div>
        </div>
    </div>

    <div class=" w-full relative overflow-hidden">
        <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
            <thead class="bg-gray-100 dark:bg-gray-800  ">
            <tr class=" rtl:text-right ltr:text-left">
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('att.emp') }} 
                </th>
                <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('att.hours') }}
                </th>
                <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                
                </th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
        
                    @forelse ($attds as $attd)
                        <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                            <td class="px-6 py-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="ml-2 flex space-x-2 ">
                                        <div class="flex flex-col">
                                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                                <span class=""> </span>
                                                <a wire:navigate href="{{url(app()->getLocale().'/Emp'.'/'.$attd['id']) }}"  class=" hover:underline underline-offset-2">
                                                    @if (app()->getLocale() == 'ar') {{ $attd['nom'] }}  @else {{ $attd['nomfr'] }}  @endif

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-2">
                                <div class="w-full text-sm font-semibold text-gray-900 dark:text-gray-200">
                                        {{ $attd['nbp']   }} 
                                </div>
                            </td>
                            <td></td>
                            
                        </tr>
                    @empty
                    @endforelse

    
            </tbody>
        </table>
        <div  wire:loading.flex class=" flex justify-center  items-center w-full h-full absolute top-0 dark:bg-gray-950 opacity-50 bg-white z-5">
            <div role="status ">
                <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-teal-500" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/></svg>
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

</div>
<div>
    <div class=" flex justify-between border-b dark:border-gray-600 p-2">
        <span class="text-lg font-bold dark:text-gray-100">
          {{ $pnom->nom }}
        </span>
        <button x-on:click="jorn()" class="print:hidden bg-gray-200 p-2 rounded-md hover:bg-teal-200 text-teal-800 ">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
            </svg>
        </button>
    </div>

    <table class="w-full">
        <thead>
        <tr>
            <th class="p-1 dark:bg-gray-800 dark:border-gray-600 print:border-gray-900 border-r print:border h-10 w-16 xl:text-sm text-xs">
                <span class=""></span>
            </th>

            @foreach ($WEEK_DAYS as $WEEK_DAY)
                <th class="p-1 dark:bg-gray-800 dark:text-gray-100 dark:border-gray-600 border-r print:border border-gray-300 print:border-gray-900 bg-gray-100  last:border-x h-10 w-8 xl:text-sm text-xs ">
                    <span class="print:text-gray-900 dark:print:text-gray-900">{{ $WEEK_DAY }}</span>
                </th>
            @endforeach

        </tr>
        </thead>
            <tbody>
                    @foreach ($Times as $Time)
                        <tr class="text-center h-16 dark:bg-gray-800 dark:text-gray-100">
                            @foreach ($WEEK_DAYS as $WEEK_DAY)
                                @if ($loop->first)
                                    <td class="border print:border-gray-900 dark:bg-gray-800 dark:border-gray-600 border-gray-300 bg-gray-100 text-gray-800 p-1 h-40   ">
                                        <div class="top h-5 w-full">
                                            <span class="text-gray-500 dark:text-gray-300 font-medium print:text-gray-900 dark:print:text-gray-900">{{ $Time }}</span>
                                        </div>
                                    </td>
                                @endif   
                                <td class="border dark:bg-gray-800 dark:border-gray-600 print:border-gray-900 p-1 h-40 w-10 relative ">  
                                                @can('dir')
                                                    <button  wire:click="$dispatchTo('add-calandar-p','open',{ id1: {{ $loop->index  }}, id2 : {{ $loop->parent->index }} })" class="absolute top-1 right-1 print:hidden">
                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                        </svg>                                  
                                                    </button>   
                                                @endcan 
                                            @forelse ($datas as $data)
                                                @if ($data->time == $loop->parent->parent->index and $data->day == $loop->parent->index)   
                                                @can('dir')
                                                <button wire:click="$dispatchTo('c-clandar-del','open',{ id: {{ $data->id  }} })" class="absolute top-1 left-1 stroke-red-600 print:hidden">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="stroke-red-600 dark:stroke-red-400 w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>                                                                               
                                                </button>
                                                    
                                                @endcan
                                               
                                                    <div wire:loading.remove class=" my-1 font-bold text-sm print:text-xs text-teal-600 dark:text-teal-300 print:text-gray-900 dark:print:text-gray-900">
                                                        {{ $data->mat->nom }}
                                                    </div>
                                                    <div wire:loading.remove class=" font-bold text-gray-800 text-xs  dark:text-gray-200 print:text-gray-900 dark:print:text-gray-900">
                                                        {{ $data->classe->nom }}
                                                    </div>
                                                    <div wire:loading role="status">
                                                        <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-teal-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                                        </svg>
                                                    </div>
                                                @endif
                                            @empty
                                            @endforelse
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
            </tbody>
    </table>


</div>

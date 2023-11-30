<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold print:text-3xl print:font-bold text-xl  text-gray-800 dark:text-gray-100 leading-tight">
            {{ $classe->nom }} 
        </h2>
    </x-slot>

    <div >
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
            <div class="flex flex-col space-y-2 w-full  p-4 print:p-0 ">
                <div class="p-1 flex justify-between items-center w-full">
                    <div class="print:text-2xl opacity-0 print:opacity-100 print:font-bold">
                         {{ $classe->nom }}
                    </div>
                    <button x-on:click="printDiv()" class="print:hidden bg-gray-50 p-4 rounded-md hover:bg-teal-200 text-teal-800 ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                        </svg>
                    </button>
                  
                </div>
                <table class="w-full print:border  print:border-gray-900 print:divide print:devide-y print:divide-gray-800 print:divide divide-y divide-gray-200 print:rounded-none print:shadow-none dark:divide-gray-600 rounded-lg shadow-md overflow-hidden">
                    <thead class="bg-gray-100 dark:bg-gray-900 print:bg-gray-300 ">
                        <tr class="">
                            <th scope="col" class="print:w-40 w-3/12 print:px-4   px-6 py-3 ltr:text-left rtl:text-right font-semibold text-xs  text-gray-500 print:text-black dark:print:text-black dark:text-gray-300 uppercase tracking-wider">
                                {{ __('classe.nb') }}
                            </th>
                            <th scope="col" class="print:w-fit  w-3/5 px-8 py-3 print:border-x print:border-gray-900 ltr:text-left rtl:text-right text-xs font-medium text-gray-500 print:text-black dark:print:text-black dark:text-gray-300 uppercase tracking-wider">
                                {{ __('classe.nom') }}
                            </th>
                           
                
                
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 print:border  print:border-gray-900 print:divide divide-y divide-gray-200 print:divide-gray-800 dark:divide-gray-600">
                
                            @foreach ($lists as $list)
                                <tr class="h-2 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70                                ">
                                    <td class="px-6 py-1 font-bold text-teal-800 dark:text-teal-200 whitespace-nowrap print:text-black dark:print:text-black">
                                        {{ $list->nb   }} 
                                    </td>
                                    <td class="px-6 py-1 whitespace-nowrap print:border-x print:border-gray-900">
                                        <div class="flex items-center">
                                            <div class="flex space-x-2 ">
                                                <div class="flex flex-col">
                                                    <a wire:navigate  href="{{ route('Etudiant',$list->id) }}"   class="h-full w-full font-semibold hover:underline dark:decoration-gray-100">
                                                        <div class="text-sm font-semibold text-gray-900 print:text-black dark:print:text-black dark:text-gray-200">
                                                            {{app()->getLocale() == 'ar' ? $list->nom : $list->nomfr }} 
                                                        </div>
                                                    </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            @endforeach
              
                    </tbody>
                </table>


            </div>
    </div>
</x-app-layout>
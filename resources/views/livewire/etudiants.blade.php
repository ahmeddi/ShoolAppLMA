<div class="w-full h-full px-2 ">
    <div class= "flex justify-between mb-3">
            @can('dir_or_comps')
                <button wire:click="$dispatchTo('etudiant-add','open')" class='focus:outline-none px-4 py-1 dark:text-gray-900 dark:bg-gray-100 text-white rounded-md hover:outline-none bg-teal-600 hover:bg-teal-800' >
                    + {{ __('etudiants.etuds-add') }}
                </button>
            @endcan
        
        
        

        <div class="relative w-80 ">
            <div class=" absolute top-2.5 left-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 stroke-current text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
            <input wire:model.live="search" id="find" class="inputs rounded-md h-10 w-full pl-8" type="text" name="find"  />   
        </div>
    </div>


    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100  dark:bg-gray-800 w-full">
            <tr class="w-full " >
                <th scope="col" class="ltr:text-left rtl:text-right px-12 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('etudiants.etud') }}
                </th>
                <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('etudiants.nb') }}
                </th>
                <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('etudiants.ns') }}
                </th>
                <th scope="col" class="px-6 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                     {{ __('etudiants.prent') }}
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
    @foreach ($etudiants as $etudiant)
        <tr @class(['h-4','w-full','text-center','bg-red-500/20' => $etudiant->list, 'dark:bg-red-900/30' => $etudiant->list])  >
            <td class="px-6 py-3 w-1/2 whitespace-nowrap">
                <div class="flex items-center w-full">
                    <div class="flex-shrink-0 h-10 w-10 mx-4 text-gray-300 dark:text-gray-600 rounded-full overflow-hidden">
                        @if ($etudiant->image)
                            <img  class=" object-cover h-full w-full" src="{{ asset('storage'.'/'.$etudiant->image) }}" />
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-full w-full" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                        </svg>    
                        @endif
                    </div>
                    <div class="ml-2 flex space-x-2 ">

                        <div class="flex flex-col rllt">
                            <div class="text-sm font-semibold text-gray-900 dark:text-gray-200">
                                <span class=""> </span>
                                <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etudiant->id) }}" class=" hover:underline" >
                                    {{  $etudiant->nom }} 
                                </a>
                            </div>
                            <div class="text-sm text-gray-500">
                                <span class="text-sm font-semibold font-ar ">
                                    <strong class="text-gray-400 dark:text-gray-300 flex justify-end"></strong>
                                </span>
                                <span ></span>
                                <span class="font-ar ">{{ $etudiant->nomfr }} </span>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </td>
            <td class="px-6 py-3 whitespace-nowrap">
                <div class="text-sm text-gray-900 dark:text-gray-300"> {{ $etudiant->nb }}</div>
                <div  class="text-sm text-gray-900 dark:text-gray-300"> {{  $etudiant->classe->nom  }}</div>
            </td>
            <td class="px-6 py-3 whitespace-nowrap">
                <div class=" text-sm text-gray-900 dark:text-gray-300"> {{ $etudiant->nc }}</div>
            </td>
            <td class="px-6 py-3 whitespace-nowrap  text-gray-900 dark:text-gray-300 text-sm font-medium rllt">
                <a wire:navigate.hover href="{{url(app()->getLocale().'/Parent'.'/'.$etudiant->parent->id) }}" class=" hover:underline capitalize" >
                    {{ app()->getLocale() == 'ar' ? $etudiant->parent->nom : $etudiant->parent->nomfr }} 
                </a>
                <div dir="ltr"   class="text-sm  text-gray-900 dark:text-gray-400"> {{    chunk_split($etudiant->parent->telephone, 2, ' ')   }}</div>

            </td>
            
        </tr>
    @endforeach
  
        </tbody>
    </table>
  <div class="mt-2"> {{ $etudiants->links() }}</div>
   
 </div>



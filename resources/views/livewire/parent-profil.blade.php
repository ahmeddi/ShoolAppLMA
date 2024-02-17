<div class="flex w-full  ">
    <div class=" relative w-full ">
        <div class="w-full  ">
            <div class="flex w-auto  mb-4  ">
                <div class="flex w-full  justify-between text-teal-900">
                    <div class=" w-full p-1">
                        <div class="w-full flex flex-col px-3 space-y-1">

                            @can('dir')
                                <div class=" w-auto  flex justify-start">
                                    <button  wire:click="$dispatch('edit',{ id: {{ $ids }} })" class="flex mb-2 bg-teal-500 text-teal-50 p-2 rounded  ">
                                        <div class="mx-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                            </svg>
                                        </div>
                                        <div> 
                                            {{ __('prof.prof-info') }}
                                        </div>
                                    </button>
                                </div>
                            @endcan
                            
                            {{-- @cannot('parent') --}}
                                <div class=" w-full border border-gray-200 dark:border-gray-800 shadow grid grid-cols-1 divide-x-0 lg:divide-x divide-y lg:divide-y-0  md:divide-x md:divide-y  divide-gray-200 dark:divide-gray-600 rtl:divide-x-reverse sm:grid-cols-2 lg:grid-cols-4 rounded-md overflow-hidden">
                                    <x-My.card :label="__('etudiants.cot')" :montant="$frais" :exp="'no'" :border="1" :url="'/Parent'.'/'.$ids.'/Frais'" />
                                    <x-My.card :label="__('home.reccet')" :montant="$paiements" :exp="'no'" :border="1" :url="'/Parent'.'/'.$ids.'/Paiements'" />
                                    <x-My.card :label="__('home.disc')" :montant="$remises" :exp="'no'" :border="1" :url="'/Parent'.'/'.$ids.'/Remises'" />
                                    <x-My.card :label="__('home.compt')" :montant="$compts" :exp="'no'" :border="1" :url="'#'" />
                                </div>
                            {{-- @endcannot --}}

                            <!-- Table Section -->
                            <div class="w-full my-2">
                                <!-- Card -->
                                <div class="flex flex-col">
                                <div class=" w-full overflow-x-auto">
                                    <div class=" w-full  inline-block align-middle">
                                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-slate-900 dark:border-gray-700">
                                        <!-- Header -->
                                        <div class="px-3 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                                        <div>
                                            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                                            {{ __('etudiants.etuds') }}
                                            </h2>
                                        </div>

                                        @can('dir')
                                        <div>
                                            <div class="inline-flex gap-x-2">
                                                    <button wire:click="$dispatch('add')" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-teal-600 dark:bg-gray-50 dark:text-gray-900 text-white hover:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">
                                                        <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                        <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                                                        </svg>
                                                        {{ __('etudiants.etuds-add') }}
                                                    </button>
                                            </div>
                                        </div>
                                        @endcan

                                        </div>
                                        <!-- End Header -->
                            
                                        <!-- Table -->
                                        <table class=" w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 dark:bg-slate-800">
                                            <tr class=" px-2">
                                            <th scope="col" class=" px-4 py-3 ">
                                                <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    {{ __('etudiants.etud') }}
                                                </span>
                                                </div>
                                            </th>
                            
                                            <th scope="col" class="px-2 py-3 ">
                                                <div class="flex items-center gap-x-2">
                                                <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                                                    {{ __('etudiants.nb') }}
                                                </span>
                                                </div>
                                            </th>
                            
                            
                                            </tr>
                                        </thead>
                            
                                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                            @foreach ($etuds as $etudiant)
                                                <tr class=" hover:bg-gray-100 hover:dark:bg-gray-800">
                                                    <td class="size-px whitespace-nowrap">
                                                        <a class=" w-full h-full" wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etudiant->id) }}" >
                                                            <div class=" px-2 py-3">
                                                                <div class="flex items-center gap-x-3  ">
                                                                    <div  class=" flex-shrink-0 text-gray-800 dark:text-gray-200 h-10 w-10 overflow-hidden rounded-full">
                                                                        @if ($etudiant->image)
                                                                            <img  class=" flex-shrink-0 object-cover h-10 w-10 rounded-full overflow-hidden " src="{{ asset('storage'.'/'.$etudiant->image) }}" />
                                                                        @else
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-300 dark:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
                                                                        </svg>    
                                                                        @endif
                                                                    </div>
                                                                    <div class="grow">
                                                                        <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200"> {{ $etudiant->nom }} </span>
                                                                        <span class="block text-sm text-gray-500"> {{ $etudiant->nomfr }} </span>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td class=" whitespace-nowrap">
                                                        <a class=" w-full h-full" wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etudiant->id) }}" >
                                                            <div class="px-2 py-3">
                                                                <span class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $etudiant->nb }}</span>
                                                                <span class="block text-sm text-gray-500">{{  $etudiant->classe->nom  }}</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <!-- End Card -->
                            </div>
                            <!-- End Table Section -->
                        </div>

                        
                        <div>
    
                        </div>
    
                    </div>

                </div>



            </div>


        </div>

        
    </div>
    
</div>

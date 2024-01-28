<div class=" p-2 ">
    <div class=" bg-white p-3 dark:bg-gray-900 rounded-md">
        <div  class="flex space-x-4 justify-between  text-center text-gray-500  ">
            <div class=" grid gap-2 grid-cols-1 lg:grid-cols-4  items-center">
                <div class="flex flex-col">
                    <label for="eid"  class="labels rllt">{{ __('result.sem') }} :</label>
                    <select wire:model='moy_sem'  class="inputs  w-32 "   required >
                        @foreach ($sems as $sem)
                            <option  class="text-sm" value="{{$sem->id}}">
                                @if (app()->getLocale() == 'ar')
                                    {{$sem->nom}}
                                @else
                                    {{$sem->nomfr}}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="eid"  class="labels opacity-0">{{ __('result.mat') }} :</label>
                    <div class="relative">

                      <input type="text" wire:model.defer='moy_etud' class="inputs w-36">

                      <div class="absolute ltr:right-0 rtl:left-0  inset-y-0 flex items-center text-gray-500 ">
                        
                        <select wire:model='filts_moy' class="inputs w-16">
                          <option  value="1">+</option>
                          <option  value="2">-</option>
                        </select>

                      </div>
                    </div>
                  </div>
                <div class="flex flex-col">
                    <label for="eid"  class="labels opacity-0">{{ __('result.mat') }} :</label>
                    <button wire:click='filterMoy'  type="button" class="w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ __('classe.filtre') }} 
                    </button>
                </div>
            </div>
        </div> 
    </div>
    <div class=" text-gray-900 dark:text-gray-50 bg-white p-3 flex gap-x-4 dark:bg-gray-900 rounded-b-md ">
        @if ($total)
            <span class="flex gap-x-3"><span>{{ __('classe.etuds') }}: </span> 
                @if ($etudFiltre)
                     <span class=" font-bold">{{ $total }}</span>
                @else
                    <span class=" font-bold"> {{ $etuds->count() }} <span class=" font-semibold text-sm"> /{{ $total }}</span>  </span> 
                @endif 
            </span>
            <span>
                {{ __('classe.males') }} : <span class=" font-bold"> {{ $males }} </span> <span class="  text-sm">@if($etuds->count()) ({{ round(($males*100)/($etuds->count()),2) }}%) @endif  </span>
            </span>
            <span>
                {{ __('classe.femms') }} :  <span class=" font-bold"> {{ $females }} </span><span class=" text-sm">@if($etuds->count())  ({{  round(($females*100)/($etuds->count()),2)  }}%)@endif   </span>
            </span>
        @endif
    </div>  
    <div class="w-full  relative ">
            <table wire:loading.class="opacity-50"  class="w-full   overflow-hidden my-6 text-sm rllt text-gray-800 dark:text-gray-100 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-900 rounded-t-lg">
                        <th scope="col" class="px-6 py-2  ">
                            {{ __('etudiants.etud') }}
                        </th>
                        <th scope="col" class="px-6 py-2 w-40 break-words">
                            {{ __('classe.moy') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($etuds as  $etud)
                            <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70 border-b  dark:border-gray-700">
                                <td scope="row" class="px-6 py-2 break-words font-semibold text-gray-900  dark:text-white">
                                    <a wire:navigate.hover href="{{url(app()->getLocale().'/Etudiant'.'/'.$etud->id) }}" class=" hover:underline" >
                                        @if (app()->getLocale() == 'ar')
                                            {{ $etud->nom }}
                                        @else
                                            {{ $etud->nomfr }}
                                        @endif
                                    </a>
                                </td>
                                <td scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div @class(['text-teal-600 dark:text-teal-300 my-1 rllt font-bold text-sm print:text-xs flex rtl:flex-row-reverse ltr:flex rtl:justify-end ', ])>
                                        @if ($moy_sem)
                                            <div>{{ $etud->moy }}</div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                    @empty
                    @endforelse
                </tbody>
            </table> 
    </div>
</div>
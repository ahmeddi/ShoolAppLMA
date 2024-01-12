<div class=" mx-2">
    <div class=" bg-white shadow-md p-3 dark:bg-gray-900 rounded-md">
        <div  class="flex space-x-4 justify-between  text-center text-gray-500  ">
            <div class=" grid gap-2 grid-cols-2 lg:grid-cols-4  items-center">
                <div class="flex flex-col">
                    <label for="eid"  class="labels rllt">{{ __('result.sem') }} :</label>
                    <select wire:model='sem'  class="inputs  w-32 "   required >
                        <option  class="text-sm" value="*">{{ __('compt.Tous') }}</option>
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
                <div class="flex flex-col">
                    <label for="eid"  class="labels rllt">{{ __('result.mat') }} :</label>
                    <select wire:model='mat'  class="inputs w-32 "   required >
                        <option  class="text-sm" value="*">{{ __('compt.Tous') }}</option>
                        @foreach ($mats as $mat)
                            <option  class="text-sm" value="{{$mat->id}}">{{$mat->nom}}</option>
                        @endforeach
                    </select>
                </div> 
                <div>
                    <label for="eid"  class="labels opacity-0">{{ __('result.mat') }} :</label>
                    <div class="relative">
                      <input type="text" wire:model.defer='score' class="inputs w-36">
                      <div class="absolute ltr:right-0 rtl:left-0  inset-y-0 flex items-center text-gray-500 ">
                        <select wire:model.defer='filts' class="inputs w-16">
                          <option selected value="1">+</option>
                          <option  value="2">-</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="flex flex-col">
                    <label for="eid"  class="labels opacity-0">{{ __('result.mat') }} :</label>
                    <button wire:click='filterResults'  type="button" class="w-full inline-flex justify-center rounded-md border dark:border-gray-500 shadow-sm px-4 py-2 focus:outline-none bg-teal-600 hover:bg-teal-800 text-white dark:text-gray-900 dark:bg-gray-100 dark:hover:bg-gray-200 font-bold sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        {{ __('classe.filtre') }} 
                    </button>
                </div>
 
            </div>
            <div class=" flex justify-around   ">

            </div>

        </div> 
    </div> 
    @if ($results)
        @if ($results->count() > 0)
            <div class="w-full  relative ">
                    <table wire:loading.class="opacity-50"  class="w-full   overflow-hidden my-6 text-sm rllt text-gray-800 dark:text-gray-100 rounded-lg shadow-md">
                        <thead>
                            <tr class="bg-gray-100 dark:bg-gray-900 rounded-t-lg">
                                <th scope="col" class="px-6 py-2  ">
                                    {{ __('result.dev/exam') }}
                                </th>
                                <th scope="col" class="px-6 py-2  ">
                                    {{ __('etudiants.etud') }}
                                </th>
                                <th scope="col" class="px-6 py-2 w-40 break-words">
                                    {{ __('result.mat') }}
                                </th>
                                <th scope="col" class="px-6 py-2">
                                    {{ __('result.note') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($results as  $result)
                                @if ($result->note > 0)
                                <tr class="odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70 border-b  dark:border-gray-700">
                                    <th scope="row" class="px-6 py-2 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                        @if (app()->getLocale() == 'ar')
                                            <div class=" flex flex-col ">
                                                <span>
                                                    {{ $result->examen->nom }}
                                                </span>
                                                <span class=" text-gray-600 dark:text-gray-300 text-xs">
                                                    {{ $result->examen->sem->nom }}
                                                </span>
                                            </div>
                                        @else
                                            <div class=" flex flex-col ">
                                                <span>
                                                    {{ $result->examen->nomfr }}
                                                </span>
                                                <span class=" text-gray-600 dark:text-gray-300 text-xs">
                                                    {{ $result->examen->sem->nomfr }}
                                                </span>
                                            </div>
                                        @endif
                                    </th>
                                    <th scope="row" class="px-6 py-2 break-words font-semibold text-gray-900  dark:text-white">
                                        @if (app()->getLocale() == 'ar')
                                            {{ $result->etudiant->nom }}
                                        @else
                                            {{ $result->etudiant->nomfr }}
                                        @endif
                                    </th>
                                    <th scope="row" class="px-6 py-2 w-40 break-words font-semibold text-gray-900  dark:text-white">
                                        {{ $result->mat->nom }}
                                    </th>
                                    @php
                                       $note = $result->note;
                                       $tot = $result->proportions->tot*2;
                                       $color = 0;
                                       if ( $note < $tot/2) {
                                        $color = 1;
                                       }
                                    @endphp
                                    <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div @class(['my-1 rllt font-bold text-sm print:text-xs flex rtl:flex-row-reverse ltr:flex rtl:justify-end ', 
                                        'text-teal-600 dark:text-teal-300' => !$color,
                                        'text-red-600 dark:text-red-300' => $color,
                                        ])>
                                              
                                            <div>{{ $note }}</div>
                                           
                                        </div>
                                    </th>
                                </tr>
                                    
                                @endif
                                
                            @empty
                            @endforelse
                        </tbody>
                    </table> 
            </div>
        @endif
    @endif
    
</div>

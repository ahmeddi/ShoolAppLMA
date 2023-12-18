<div class=" mx-2">
    <div class=" bg-white shadow-md p-3 dark:bg-gray-900 rounded-md">
        <div  class="flex space-x-4 justify-between  text-center text-gray-500  ">
            <div class="flex  items-center">
                <div class="flex flex-col mx-1">
                    <label for="eid"  class="labels rllt">{{ __('result.sem') }} :</label>
                    <select wire:change='filterResults' wire:model='sem'  class="inputs  w-32 "   required >
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
                <div class="flex flex-col mx-1">
                    <label for="eid"  class="labels rllt">{{ __('result.mat') }} :</label>
                    <select wire:change='filterResults' wire:model='mat'  class="inputs w-32 "   required >
                        <option  class="text-sm" value="*">{{ __('compt.Tous') }}</option>
                        @foreach ($mats as $mat)
                            <option  class="text-sm" value="{{$mat->id}}">{{$mat->nom}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="flex flex-col">
                    <label for="eid"  class="labels opacity-0">{{ __('result.mat') }} :</label>
                    <select wire:change='filterResults' wire:model='score'  class="inputs w-32 "   required >
                        <option  class="text-sm" value="*">{{ __('compt.Tous') }}</option>
                        <option class="text-sm" value="1">{{ "+10" }}</option>
                        <option class="text-sm" value="2">{{ "-10" }}</option>
                    </select>
                </div>
 
            </div>
            <div class=" flex justify-around   ">

            </div>

        </div> 
    </div> 
    @if ($results->count() > 0)

    <div class="w-full  ">
            <table class="w-full  overflow-hidden my-6 text-sm rllt text-gray-800 dark:text-gray-100 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-900 rounded-t-lg">
                        <th scope="col" class="px-6 py-2  ">
                            {{ __('result.dev/exam') }}
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
                            <th scope="row" class="px-6 py-2 w-40 break-words font-semibold text-gray-900  dark:text-white">
                                {{ $result->mat->nom }}
                            </th>
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="my-1 font-bold text-sm print:text-xs text-teal-600 dark:text-teal-300 print:text-gray-900 dark:print:text-gray-900">
                                    {{ $result->note }}
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
</div>

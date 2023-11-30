<div>
    @if ($results->count() > 0)
    <div class="w-full ">
            <table class="w-full my-6 text-sm rllt text-gray-800 dark:text-gray-100 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-900 rounded-t-lg">
                        <th scope="col" class="px-6 py-2  ">
                            {{ __('result.dev/exam') }}
                        </th>
                        <th scope="col" class="px-6 py-2">
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
                                    {{ $result->examen->nom }}- {{ $result->examen->sem->nom }}
                                    
                                @else
                                {{ $result->examen->nomfr }}- {{ $result->examen->sem->nomfr }}
                                @endif
                            </th>
                            <th scope="row" class="px-6 py-2 font-semibold text-gray-900 whitespace-nowrap dark:text-white">
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

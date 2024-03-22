<div class="py-2 ">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-4">
        <div class="flex flex-col space-y-2  overflow-hidden  p-4 my-4">
            <table class="w-full divide-y divide-gray-200 dark:divide-gray-600 rounded-lg shadow-md overflow-hidden">
                <thead class="bg-gray-100 dark:bg-gray-900  ">
                <tr>
                    <th scope="col" class="px-6 py-3 rllt font-bold text-sm tracking-tight  text-gray-600 dark:text-gray-300 uppercase ">
                            {{ __('jorns.class') }}
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                    @foreach ($classes as $Class)
                    <tr class="h-5 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-800 dark:even:bg-gray-800/70">
                        <td class="px-6 py-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex space-x-2">
                                    <div class="flex flex-col">
                                        <div class="text-sm rllt font-bold text-gray-800 dark:text-gray-200">
                                            <a wire:navigate.hover href="{{url(app()->getLocale().'/Classe/'.$Class->id.'/Results') }}"  class="h-full w-full hover:underline">
                                                {{ $Class->nom   }}
                                            </a>
                                        </div>
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

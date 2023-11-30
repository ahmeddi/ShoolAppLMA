<div>
    <table class="w-full table-auto divide-y divide-gray-200 dark:divide-gray-600 rounded-t-xl overflow-hidden">
        <thead class="bg-gray-100  dark:bg-gray-900/50 w-full">
            <tr class="w-full " >
                <th scope="col" class="ltr:text-left rtl:text-right px-8 py-3  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                  
                </th>

                <th scope="col" class="px-6 py-3 rllt  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.montnat') }} 
                </th>
                <th scope="col" class="px-6 py-3 rllt  text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                    {{ __('ent.date') }} 
                </th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-600">
    
    @forelse ($dettes->echeances  as $dette)
        <tr @class(['h-4','w-full','text-center','bg-red-500/20' => $dette->list, 'dark:bg-red-900/30' => $dette->list])  >
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{ $dette->nb }} 
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{ $dette->montant }} 
                </div>
            </td>
            <td dir="ltr" class="px-6 py-3 whitespace-nowrap ">
                <div class="text-sm font-semibold rllt text-gray-900 dark:text-gray-200">
                        {{ $dette->date }} 
                </div>
            </td>
            
        </tr>
    @empty

    @endforelse
  
        </tbody>
    </table>   
</div>

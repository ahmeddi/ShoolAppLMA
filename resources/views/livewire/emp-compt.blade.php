<div class="max-w-7xl mx-auto px-4">

    <div class=" my-5">
        <div wire:loading.attr="disabled" class=" my-2 flex w-full justify-end w ">
            <x-Dropdown.dropdown-menu :$ranges :$selectedRange :$rangeName :$customRangeStart :$customRangeEnd/>  
        </div> 
    
        <div class=" border border-gray-200 dark:border-gray-700 shadow grid grid-cols-1 divide-x-0 lg:divide-x divide-y lg:divide-y-0  md:divide-x md:divide-y  divide-gray-200 dark:divide-gray-500 rtl:divide-x-reverse sm:grid-cols-2 lg:grid-cols-4 rounded-md overflow-hidden">
            <x-My.card :label="__('home.cot')" :montant="$hons" :exp="'no'" :border="1" :url="'/Emp'.'/'.$ids.'/Compt/Honhoraire'" />
            <x-My.card :label="__('home.reccet')" :montant="$paiements" :exp="'no'" :border="1" :url="'/Emp'.'/'.$ids.'/Compt/Paiements'" />
            <x-My.card :label="__('home.disc')" :montant="$remises" :exp="'no'" :border="0" :url="'/Emp'.'/'.$ids.'/Compt/Paiements'" />
            <x-My.card :label="__('home.compt')" :montant="$compts" :exp="'no'" :border="0" :url="'#'" />
        </div>
    </div> 
  
</div>
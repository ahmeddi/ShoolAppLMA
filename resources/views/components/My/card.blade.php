@props(['label', 'montant', 'exp', 'border', 'url'])


    
    @if ($url != '#')
    <a wire:navigate.hover href="{{url(app()->getLocale().$url) }}">
    @endif
    <div class=" w-full h-full flex-1 flex flex-col items-center justify-center p-4 bg-white  dark:bg-gray-900 hover:bg-gray-50 dark:hover:bg-gray-800">
        <div class="flex flex-row items-center justify-between w-full">
          <div class=" text-base font-semibold text-gray-500 dark:text-gray-300">{{ $label }}</div>
          <div dir="ltr" class="text-sm font-semibold text-green-500">
            @if ($exp != 'no')
                {{  number_format($exp, 0, '.', ' ')  }} @if ($exp) <span class="">MRU</span>@endif 
            @endif
             
          </div>
        </div>
        <div class="flex flex-row items-center justify-between w-full">
          <div dir="ltr" class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                {{ number_format($montant, 0, '.', ' ')  }} 
                @if ($montant)
                    <span class=" text-lg">MRU</span>
                @endif  
          </div>
        </div>
      </div>
      @if ($url != '#')
      </a>
      @endif
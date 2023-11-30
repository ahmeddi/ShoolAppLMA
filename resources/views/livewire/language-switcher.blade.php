@php
    $lcl = app()->getLocale();
    $currentUri = request()->getRequestUri();
    $lcl == 'fr' ? $str = 'العربية'  : $str = 'Français' ;
    $lcl == 'fr' ? $locale = 'ar'  : $locale = 'fr' ;

@endphp

<div class="text-sm mx-8">
    
        <button wire:click='switchLocale("{{ $locale  }}","{{ $currentUri  }}")' > {{ $str }}</button>

    
</div>


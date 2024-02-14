@props(['column', 'sortCol', 'sortAsc', 'types'])

<button wire:click="sortBy('{{ $column }}')" {{ $attributes->merge(['class' => 'flex w-full items-center gap-2 group']) }}>
    @if ($sortCol === $column)
        <div class="text-gray-400">
            @if ($sortAsc)
                <x-icon.arrow-long-up />
            @else
                <x-icon.arrow-long-down />
            @endif
        </div>
    @else
        <div class="text-gray-400 opacity-0 group-hover:opacity-100">
            <x-icon.arrows-up-down />
        </div>
    @endif
    {{ $slot }}
</button>

@props(['ranges'])

<x-popover>
    <x-popover.button class="flex items-center gap-2 rounded-lg border pl-3 pr-2 py-1 text-gray-600 text-sm">
        <div>
            All Time
        </div>

        <x-icon.chevron-down />
    </x-popover.button>

    <x-popover.panel class="border border-gray-100 shadow-xl z-10" position="bottom-end">
        <div class="flex flex-col divide-y divide-gray-100 w-64">
            <button class="w-full flex items-center justify-between text-gray-800 px-3 py-2 gap-2 cursor-pointer hover:bg-gray-100">
                <div class="text-sm">All time</div>
            </button>
            @foreach ($ranges as $range)
                <x-popover.close>
                    <button wire:click="$set('filters.range', '{{ $range }}')" class="w-full flex items-center justify-between text-gray-800 px-3 py-2 gap-2 cursor-pointer hover:bg-gray-100">
                        <div class="text-sm">{{ $range }}</div>
                        @if ($range)
                            <x-icon.check />
                        @endif
                    </button>
                </x-popover.close>
            @endforeach
        </div>
    </x-popover.panel>
</x-popover>

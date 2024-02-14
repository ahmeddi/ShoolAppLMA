@props(['ranges', 'selectedRange', 'rangeName', 'customRangeStart', 'customRangeEnd'])

<div class="flex justify-center">
    <div
        x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (! this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }"
        x-on:keydown.escape.prevent.stop="close($refs.button)"
        x-on:focusin.window="! $refs.panel.contains($event.target) && close()"
        x-id="['dropdown-button']"
        class="relative"
    >
        <!-- Button -->
        <button
            x-ref="button"
            x-on:click="toggle()"
            :aria-expanded="open"
            :aria-controls="$id('dropdown-button')"
            type="button"
            class="flex items-center gap-2 bg-white text-gray-950 dark:text-gray-50 dark:bg-gray-950 px-3 py-1 rounded-md shadow"
        >
        @if ($rangeName == \App\Enums\Dates::Custom->label())
            {{ $customRangeStart }} - {{  $customRangeEnd }}
        @else
            {{ $rangeName }}
        @endif
            
            <!-- Heroicon: chevron-down -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </button>

        <!-- Panel -->
        <div
            x-ref="panel"
            x-show="open"
            x-transition.origin.top.left
            x-on:click.outside="close($refs.button)"
            :id="$id('dropdown-button')"
            style="display: none;"
            class="absolute rtl:left-0 ltr:right-0 z-40  mt-2 w-60 rounded-md bg-white dark:bg-gray-800  shadow-md overflow-hidden"
        >
            @foreach ($ranges as $index => $range)
                @if ($range === \App\Enums\Dates::Custom)
                    <div x-data="{ showCustomRangePanel: $wire.rangeName == '{{ \App\Enums\Dates::Custom->label() }}' ? true : false }">
                        <button x-on:click="showCustomRangePanel = ! showCustomRangePanel" class="w-full flex items-center justify-between text-gray-800 dark:text-gray-100 px-5 py-2 gap-2 cursor-pointer dark:hover:bg-gray-950 hover:bg-gray-100">
                            <div class="text-sm">{{ $range->label() }}</div>

                            <x-icon.chevron-down x-show="! showCustomRangePanel" />
                            <x-icon.chevron-up x-show="showCustomRangePanel" />
                        </button>

                        <form
                            x-show="showCustomRangePanel"
                            x-collapse class="flex flex-col px-3 pt-3 pb-2 gap-4"
                            wire:submit="filter('{{ $range->name }}')"
                            x-on:submit="$popover.close()"
                        >
                            <div class="flex flex-col justify-between items-center gap-2">
                                <input wire:model="customRangeStart" type="date" class="text-sm w-full text-gray-700 rounded border border-gray-300 bg-white px-2 py-1" required>

                                <input wire:model="customRangeEnd" type="date" class="text-sm w-full text-gray-700 rounded border border-gray-300 bg-white px-2 py-1" required>
                            </div>

                            <div class="flex w-full">
                                <button @click='open =false' type="submit" class="w-full flex justify-center items-center gap-2 rounded-lg    btn font-medium text-sm text-white px-3 py-1.5">
                                     {{ __('classe.filtre') }}
                                </button>
                            </div>
                        </form>
                    </div>
                @else

                        <button wire:click="filter('{{ $range->name }}')" @click='open =false' class="w-full flex items-center justify-between text-gray-800 dark:text-gray-100 px-5 py-2 gap-2 cursor-pointer dark:hover:bg-gray-950 hover:bg-gray-100">
                            <div class="text-sm ">{{ $range->label() }}</div>
                            @if ($range->value == $selectedRange)
                                <x-icon.check />
                            @endif
                        </button>
                @endif
            @endforeach
        </div>
    </div>
</div>
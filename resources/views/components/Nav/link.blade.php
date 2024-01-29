@props([
    'label' => '',
    'icon' => null,
])

<a
    href="#"
    class="flex items-center gap-2 px-5 py-0.5  dark:hover:bg-primary-800 dark:hover:text-primary-800/30 hover:dark:text-primary-200
    {{ (request()->is($label."*")) 
    ? 'border-r-4 border-primary-400 bg-primary-50 px-5 py-0.5 text-sm font-medium text-primary-900 dark:bg-primary-800/30 dark:text-primary-200' 
    : 'text-sm font-medium text-gray-700 hover:bg-primary-50 hover:text-primary-900  dark:text-gray-200' }}
    ">
    @if($icon == 'clipboard')
        <x-icon.clipboard/>
    @elseif ($icon == 'user')
        
    @endif
    <span class="grow py-2">{{ $label }}</span>
</a>

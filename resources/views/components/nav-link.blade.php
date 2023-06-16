@props([
    'active' => false
])

<a {{ $attributes->class(['font-bold text-lg uppercase cursor-pointer text-text hover:text-secondary hover:underline', '!text-secondary underline' => $active]) }}>
    {{ $slot }}
</a>

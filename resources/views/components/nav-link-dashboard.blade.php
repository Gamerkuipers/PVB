@props([
    'active' => false
])

<a {{ $attributes->class(['text-base uppercase cursor-pointer text-text hover:text-secondary hover:underline', '!text-secondary underline' => $active]) }}>
    {{ $slot }}
</a>

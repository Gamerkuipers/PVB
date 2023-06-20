@props([
    'route' => null,
    'active' => false,
    'href' => null,
])

@php($active = !$route ? $active : request()->routeIs($route))

<a {{ $attributes->class(['text-base uppercase cursor-pointer text-text hover:text-secondary hover:underline', '!text-secondary underline' => $active])
        ->merge(['href' => !$route ? $href : route($route)]) }}>
    {{ $slot }}
</a>

@props([
    'title',
    'value' => ''
])
<div class="flex flex-col sm:flex-row justify-between text-lg">
    <p class="text-secondary font-semibold">
        {{ $title }}
    </p>
    <p>
        {{ $slot ?? $value}}
    </p>
</div>

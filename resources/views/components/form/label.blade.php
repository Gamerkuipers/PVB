@props([
    'isRequired' => false,
])
<label {{ $attributes->class(['font-semibold']) }}>
    {{ $slot }} {{ $isRequired ? '*' : '' }}
</label>

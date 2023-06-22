@props([
    'isRequired' => false,
    'name' => '',
    'label' => $name
])
<div class="flex flex-col gap-1">
    <x-form.label :isRequired="$isRequired">{{ $label }}</x-form.label>
    <x-form.textarea {{ $attributes->merge(['name' => $name]) }} />
    <x-form.error :for="$name" />
</div>

@props([
    'for',
])
@error($for)
    <p {{ $attributes->class(['text-danger text-sm']) }}>
        {{ $message }}
    </p>
@enderror

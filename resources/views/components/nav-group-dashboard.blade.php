@props([
    'title'
])
<div class="space-y-2" x-data="{open: false}">
    <div class="flex gap-1 items-center z-20">
        @isset($icon)
        <div class="hover:text-secondary sm:hover:text-text cursor-pointer sm:cursor-default" @click="open = !open">
            {{ $icon }}
        </div>
        @endisset
        <h2 class="text-2xl font-bold hidden lg:block">{{ $title }}</h2>
    </div>
    {{-- Nav items --}}
    <div class="hidden sm:grid gap-1 pl-2">
        {{  $slot }}
    </div>

    <div class="block sm:hidden absolute right-0 top-0 !m-0 text-center inset-x-0">
        <div x-show="open" class="p-2 bg-primary" @click.outside="open = false">
            <div class="flex gap-2 justify-center">
                <h2 class="text-2xl font-bold">{{ $title }}</h2>
                <x-icon.cross class="cursor-pointer hover:rotate-90 transition-transform duration-300" @click="open = false"/>
            </div>
            <div class="grid gap-2 pl-2 text-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

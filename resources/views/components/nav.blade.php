<div x-data="{open: false}" class="h-16 flex bg-primary relative">


    <div class="sm:flex py-2 px-4 gap-2 justify-between w-full hidden">
        <a href="{{ route('home') }}" class="flex bg-text">
            <x-application-logo></x-application-logo>
        </a>

        <div class="flex items-center gap-4">
            {{ $slot }}
        </div>
    </div>

    <div class="px-4 py-2 flex sm:hidden justify-between w-full">
        <a href="{{ route('home') }}" class="flex bg-text">
            <x-application-logo></x-application-logo>
        </a>

        <div @click="open = !open" class="flex items-center">
            <x-icon.menu />
        </div>
    </div>

    <div class="absolute top-[100%] bg-primary w-full grid gap-4 justify-center p-4 text-center" x-cloak x-show="open" @click.outside="open = false" @click="open = false">
        {{ $slot }}
    </div>
</div>

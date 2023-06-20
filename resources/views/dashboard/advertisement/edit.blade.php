<x-app-layout>
    <x-advertisement.display-layout :advertisement="$advertisement">
        <x-slot:actions>
            <div class="flex items-center justify-between">
                <x-link-inverted :href="route('dashboard.advertisement.index')" class="w-fit">
                    <x-icon.arrow-left></x-icon.arrow-left>
                    {{ __('Alle advertenties') }}
                </x-link-inverted>

                <div class="flex items-center gap-4">
                    <a href="">
                        <x-danger-button class="h-full">{{ __('Cancel') }}</x-danger-button>
                    </a>
                    <a href="">
                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                    </a>
                </div>
            </div>
        </x-slot:actions>

        <x-slot:description>
            <div>
                <x-form.input class="w-full" :placeholder="__('Titel')" wire:model="advertisement.description"/>
            </div>
        </x-slot:description>

        <x-slot:price>
            <div class="flex items-center gap-2">
                €
                <x-form.input :placeholder="__('29.000,00')" wire:model="advertisement.price"/>
            </div>
        </x-slot:price>
    </x-advertisement.display-layout>
</x-app-layout>

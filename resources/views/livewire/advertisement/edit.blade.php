<x-advertisement.display-layout :advertisement="$advertisement">
    <x-slot:actions>
        <div class="flex items-center justify-end">
            <div class="flex items-center gap-4">
                <x-danger-button class="h-full" wire:click="confirmCancelEditing">{{ __('Cancel') }}</x-danger-button>
                <x-primary-button wire:click="save">{{ __('Save') }}</x-primary-button>
            </div>
        </div>
    </x-slot:actions>

    <x-slot:description>
        <div>
            <x-form.input class="w-full" :placeholder="__('Titel')" wire:model="advertisement.description"/>
            <x-form.error for="advertisement.description"></x-form.error>
        </div>
    </x-slot:description>

    <x-slot:price>
        <div class="flex items-center gap-2">
            €
            <x-form.input :placeholder="__('29.000,00')" wire:model="advertisement.price"/>
        </div>
    </x-slot:price>

    <x-slot:licensePlate>
        <x-form.input-cluster name="license_plate"
                              wire:model.debounce.1000ms="advertisement.license_plate"
                              :placeholder="__('License plate')"
                              :label="__('License plate')"
        ></x-form.input-cluster>
    </x-slot:licensePlate>
</x-advertisement.display-layout>

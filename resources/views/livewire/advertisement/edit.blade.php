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
        <div class="space-y-1">
            <x-form.input class="w-full"
                          :placeholder="__('Titel')"
                          wire:model="advertisement.description"
                          name="advertisement.description"/>
            <x-form.error for="advertisement.description"></x-form.error>
        </div>
    </x-slot:description>

    <x-slot:previewImage>
        <div class="relative">
            <x-delete-button class="absolute top-2 right-2" wire:click="removeFile({{ json_encode($currentPreview) }})"/>
            <img :src="currentPreview" alt="">
        </div>
    </x-slot:previewImage>

    <x-slot:previewSelection>
        @foreach($this->files as $file)
            <div class="relative">
                <div class="cursor-pointer relative"
                     @click.prevent="currentPreview = '{{ $this->getFileLocation($file) }}'" wire:click="setCurrentPreview({{ $file }})">
                    <img src="{{ $this->getFileLocation($file) }}" alt="" class="h-20 object-cover">
                </div>
                <x-delete-button class="top-2 right-2 absolute"></x-delete-button>
            </div>
        @endforeach
    </x-slot:previewSelection>

    <x-slot:price>
        <div class="space-y-1">
            <div class="flex items-center gap-2">
                €
                <x-form.input :placeholder="__('29.000,00')" wire:model="advertisement.price"/>
            </div>
            <x-form.error for="advertisement.price"></x-form.error>
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

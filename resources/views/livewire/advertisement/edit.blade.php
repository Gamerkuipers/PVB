<x-advertisement.display-layout :advertisement="$advertisement" currentPreviewStart="@entangle('currentPreview')">
    <x-slot:actions>
        <div class="flex items-center justify-end">
            <div class="flex items-center gap-4">
                <x-danger-button class="h-full" wire:click="confirmCancelEditing">{{ __('Cancel') }}</x-danger-button>
                <x-primary-button wire:click="save">{{ __('Save') }}</x-primary-button>
            </div>
        </div>
    </x-slot:actions>

    <x-slot:description>
        <div class="space-y-1 w-full">
            <div class="flex items-center justify-end gap-2 font-semibold">
                <x-form.checkbox wire:model="isSold"/>
                {{ __('Is sold?') }}
            </div>
            <x-form.input class="w-full"
                          :placeholder="__('Titel')"
                          wire:model="advertisement.description"
                          name="advertisement.description"/>
            <x-form.error for="advertisement.description"></x-form.error>
        </div>
    </x-slot:description>

    <x-slot:previewImage>
        <div class="relative">
            @if($this->files->isNotEmpty())
                @if($currentPreview::class === \Livewire\TemporaryUploadedFile::class)
                    <x-delete-button class="absolute top-2 right-2"
                                     wire:click="removeTempFile('{{ $currentPreview->getFilename() }}')"/>
                    <img src="{{ $currentPreview->temporaryUrl() }}" alt="">
                @else
                    <x-delete-button class="absolute top-2 right-2"
                                     wire:click="removeFile({{ json_encode($currentPreview) }})"/>
                    <img src="{{ $this->getFileLocation($currentPreview) }}" alt="">
                @endif
            @else
                <x-empty-file/>
            @endif
        </div>
    </x-slot:previewImage>

    <x-slot:previewSelection>
        @foreach($this->files as $file)
            <div class="relative">
                @if($file::class === \Livewire\TemporaryUploadedFile::class)
                    <div class="cursor-pointer relative"
                         wire:click="setCurrentPreviewTemp('{{ $file->getFilename() }}')">
                        <img src="{{ $file->temporaryUrl() }}" alt="" class="h-20 object-cover">
                    </div>
                    <x-delete-button class="top-2 right-2 absolute"
                                     wire:click="removeTempFile('{{ $file->getFilename() }}')"></x-delete-button>
                @else
                    <div class="cursor-pointer relative"
                         wire:click="setCurrentPreview({{ json_encode($file) }})">
                        <img src="{{ $this->getFileLocation($file) }}" alt="" class="h-20 object-cover">
                    </div>
                    <x-delete-button class="top-2 right-2 absolute"
                                     wire:click="removeFile({{ json_encode($file) }})"></x-delete-button>
                @endif
            </div>
        @endforeach
    </x-slot:previewSelection>

    <x-slot:uploadSection>
        <div class="flex justify-end" x-data>
            <x-form.input type="file" class="hidden" wire:model="newFileUploads" x-ref="new_file_uploads"
                          @opennewfileuploads.window="$el.click()" accept="image/png, image/jpeg, image/jpg"
                          multiple></x-form.input>
            <div>
                <x-link-inverted class="w-fit"
                                 @click.prevent="$refs.new_file_uploads.click()">{{ __('Add images') }}</x-link-inverted>
                <x-form.error for="newFileUploads"></x-form.error>
                <x-form.error for="newFileUploads.*"></x-form.error>
                <div wire:loading wire:target="newFileUploads" class="text-orange-500">
                    {{ __('Uploading files') }}
                </div>
            </div>

        </div>
    </x-slot:uploadSection>

    <x-slot:price>
        <div class="space-y-1">
            <div class="flex items-center gap-2">
                €
                <x-form.input :placeholder="__('29.000,00')"
                              x-data
                              x-mask:dynamic="$money($input, ',')"
                              wire:model="advertisement.price"/>
            </div>
            <x-form.error for="advertisement.price"></x-form.error>
        </div>
    </x-slot:price>

    <x-slot:licensePlate>
        <div>
            <x-form.input-cluster name="advertisement.license_plate"
                                wire:model.debounce.1s="advertisement.license_plate"
                                :placeholder="__('License plate')"
                                :label="__('License plate')"
                                class="w-40 uppercase"
            ></x-form.input-cluster>
            <div wire:loading wire:target="advertisement.license_plate" class="text-orange-500">
                {{ __('Getting information') }}
            </div>
        </div>
    </x-slot:licensePlate>

    <x-slot:extrasList>
        @foreach($extras as $index => $extra)
            <div wire:key="advertisement.extras.{{ $index }}">
                <div class="flex w-full gap-3 items-center">
                    <x-form.input
                        wire:model="extras.{{ $index }}"
                        :placeholder="__('Extra')"
                    ></x-form.input>
                    <x-delete-button class="w-9 hover:w-10" wire:click="removeExtra({{ $index }})"/>
                </div>
                <x-form.error for="extras.{{ $index }}"></x-form.error>
            </div>
        @endforeach
        @php($nextIndex = isset($index) ? $index+1 : 0)
        <div>
            <div class="flex w-full gap-3 items-center">
                <x-form.input
                    wire:model.debounce.500ms="extras.{{ $nextIndex }}"
                    :placeholder="__('Start typing...')"
                ></x-form.input>
            </div>
        </div>
    </x-slot:extrasList>
</x-advertisement.display-layout>

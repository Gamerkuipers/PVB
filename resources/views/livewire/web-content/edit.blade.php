<div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-10">
    <div class="flex w-full justify-between">
        <h1 class="font-bold text-4xl">{{ $title }}</h1>

        {{-- Action group --}}
        <div class="flex items-center gap-4">
            <x-danger-button wire:click="confirmCancelEditing">{{ __('Cancel') }}</x-danger-button>
            <x-primary-button wire:click="save">{{ __('Save') }}</x-primary-button>
        </div>
    </div>
    <div>
        <div class="space-y-2 py-4">
            <div class="flex flex-col max-w-xl">
                <x-form.input-cluster
                    name="webContent.head"
                    isRequired
                    :label="__('Title')"
                    :placeholder="__('Title')"
                    wire:model="webContent.head"
                />
            </div>
        </div>
        <div class="space-y-2 py-4">
            <x-form.textarea-cluster
                rows="15"
                name="webContent.body"
                isRequired
                :label="__('Content')"
                :placeholder="__('About the company')"
                wire:model="webContent.body"
            />
        </div>
    </div>
</div>

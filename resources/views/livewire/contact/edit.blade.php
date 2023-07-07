<div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-4">
    <div class="flex w-full justify-between">
        <h1 class="font-bold text-4xl">{{ __('Contact') }}</h1>

        {{-- Action group --}}
        <div class="sticky top-0">
            <div class="flex items-center gap-4 w-full">
                <x-danger-button wire:click="confirmCancelEditing">{{ __('Cancel') }}</x-danger-button>
                <x-primary-button wire:click="saveContacts">{{ __('Save') }}</x-primary-button>
            </div>
        </div>
    </div>

    @can('create', \App\Models\Contact::class)
        <div x-data="{isOpen: false}" class="max-w-sm">
            <x-link-inverted class="text-lg font-bold" @click="isOpen = !isOpen">
                <p x-cloak x-show="!isOpen">{{ __('Open add new contact') }}</p>
                <p x-cloak x-show="isOpen">{{ __('Hide Add new contact') }}</p>
            </x-link-inverted>
            <form class="py-4 space-y-2 ml-2" wire:submit.prevent="addNewContact" x-cloak x-show="isOpen">
                <x-form.input-cluster
                    name="newContactName"
                    :label="__('Name')"
                    :placeholder="__('Name')"
                    wire:model="newContactName"
                />

                <x-form.input-cluster
                    name="newContactBody"
                    :label="__('Content')"
                    isRequired
                    :placeholder="__('Content')"
                    wire:model="newContactBody"
                />

                <x-primary-button type="submit">{{ __('Add') }}</x-primary-button>
            </form>
        </div>
    @endcan
    <div class="divide-y-2 divide-primary max-w-sm">
        @foreach($contacts as $index => $contact)
            <div class="space-y-2 py-4">
                <div class="flex justify-between items-center">
                    <h2 class="text-2xl font-bold">{{ $contact->name }}</h2>

                    @can('delete', \App\Models\Contact::class)
                        <x-delete-button wire:click="deleteContact({{ $index }})"/>
                    @endcan
                </div>

                <div class="pl-2">
                    <x-form.input-cluster
                        name="contacts.{{ $index }}.name"
                        :label="__('Name')"
                        :placeholder="__('Name')"
                        wire:model="contacts.{{ $index }}.name"
                    />

                    <x-form.input-cluster
                        name="contacts.{{ $index }}.body"
                        :label="__('Content')"
                        isRequired
                        :placeholder="__('Content')"
                        wire:model="contacts.{{ $index }}.body"
                    />
                </div>
            </div>
        @endforeach
    </div>
</div>

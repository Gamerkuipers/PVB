<x-app-layout>
    <div class="p-10">
        <div class="flex w-full justify-between">
            <h1 class="font-bold text-4xl">{{ __('Contact') }}</h1>

            {{-- Action group --}}
            <div class="flex items-center gap-4">
                <x-danger-button>{{ __('Cancel') }}</x-danger-button>
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
        </div>
        <div class="divide-y-2 divide-primary w-fit">
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">Telefoon</h2>

                <div class="pl-2">
                    <div class="flex flex-col gap-1">
                        <x-form.label>{{ __('Name') }}</x-form.label>
                        <x-form.input :placeholder="__('Name')" value="Telefoon"/>
                    </div>

                    <div class="flex flex-col gap-1">
                        <x-form.label>{{ __('Content') }}</x-form.label>
                        <x-form.input :placeholder="__('Content')" value="06123456789" />
                    </div>
                </div>
            </div>
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">Email</h2>

                <div class="pl-2">
                    <div class="flex flex-col gap-1">
                        <x-form.label>{{ __('Name') }}</x-form.label>
                        <x-form.input :placeholder="__('Name')" value="Email"/>
                    </div>

                    <div class="flex flex-col gap-1">
                        <x-form.label>{{ __('Content') }}</x-form.label>
                        <x-form.input :placeholder="__('Content')" value="Lorem@ipsum.nl" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

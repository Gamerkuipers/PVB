<x-app-layout>
    <div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-6 text-primary">
        {{-- Action bar --}}
        <div class="flex justify-between">
            <x-link-inverted :href="route('dashboard.ad.index')" class="w-fit">
                <x-icon.arrow-left/>
                {{ __('Alle advertenties') }}
            </x-link-inverted>

            <x-primary-button>{{ __('Create') }}</x-primary-button>
        </div>
        {{-- content --}}
        <h1 class="font-bold text-2xl">
            <x-form.input :placeholder="__('Title')" class="w-full"/>
        </h1>

        {{-- preview + info --}}
        <div class="grid md:grid-cols-2">
            <div class="relative">
                <x-delete-button class="absolute top-2 right-2"/>
                <img src="{{ asset('images/img.png') }}" alt="">
            </div>
            <div class="flex flex-col items-end p-4 text-2xl font-bold">
                <p>
                    N/A
                </p>
                <div class="flex items-center gap-1">
                    € <x-form.input placeholder="29.000,00"/>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <x-link-inverted class="w-fit">{{ __('Add images') }}</x-link-inverted>
        </div>
        {{-- All images --}}
        <div>
            <div class="flex gap-4 overflow-x-auto">
                @for ($i = 0; $i < 3; $i++)
                    <div class="relative">
                        <x-delete-button class="absolute top-2 right-2"/>
                        <img src="{{ asset('images/img.png') }}" alt="" class="w-32">
                    </div>
                @endfor
            </div>
        </div>

        {{-- specifications --}}
        <h2 class="font-bold text-4xl text-center">{{ __('Specifications') }}</h2>
        <div class="flex flex-col w-fit">
            <x-form.label for="license">{{ __('License plate') }}</x-form.label>
            <div>
                <x-form.input :placeholder="__('License plate')" name="License"/>
                <x-secondary-button class="w-fit">{{ __('Get data') }}</x-secondary-button>
            </div>
        </div>
        <div class="grid md:grid-cols-3 gap-10 text-text">
            <div class="col-span-2 bg-primary p-6 flex flex-col lg:flex-wrap min-h-fit lg:h-80 gap-x-6">
                <x-ad.specification :title="__('Brand')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Name')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Type')">N/A</x-ad.specification>
                <x-ad.specification :title="__('License plate')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Build Year')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Color')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Doors')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Seating')">N/A</x-ad.specification>
                <x-ad.specification :title="__('APK expire date')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Kilometer')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Fuel')">N/A</x-ad.specification>
                <x-ad.specification :title="__('BTW')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Transmission')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Power')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Weight')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Fuel usage')">N/A</x-ad.specification>
                <x-ad.specification :title="__('Cylinder capacity')">N/A</x-ad.specification>
            </div>
            <div class="bg-primary p-6">
                <h2 class="font-bold text-xl text-center">
                    {{ __("Extra's") }}
                </h2>
                <ul class="list-disc list-inside space-y-1">
                    @for ($i = 0; $i < 5; $i++)
                        <li class="flex gap-x-2 items-center">
                            <x-form.input value="lorem ipsum" :placeholder="__('Extra specification')"/>
                            <x-delete-button />
                        </li>
                    @endfor
                    <li class="flex gap-x-2 items-center">
                        <x-form.input :placeholder="__('Extra specification')"/>
                        <x-primary-button>{{ __('Add') }}</x-primary-button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

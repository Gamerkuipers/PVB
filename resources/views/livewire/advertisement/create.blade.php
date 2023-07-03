<div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-6 text-primary">
    {{-- Action bar --}}
    <div class="flex justify-between">
        <x-link-inverted :href="route('dashboard.advertisement.index')" class="w-fit">
            <x-icon.arrow-left/>
            {{ __('Alle advertenties') }}
        </x-link-inverted>

        <x-primary-button wire:click="create">{{ __('Create') }}</x-primary-button>
    </div>
    {{-- content --}}
    <h1 class="font-bold text-2xl">
        <x-form.input-cluster name="title"
                              :placeholder="__('Title')"
                              :label="__('Title')"
                              wire:model="title"
        />
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
            <div class="space-y-1">
                <div class="flex items-center gap-1">
                    €
                    <x-form.input placeholder="29.000,00"
                                  name="price"
                                  wire:model="price"/>
                </div>

                <x-form.error for="price"></x-form.error>
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
        <x-form.input-cluster name="licensePlate"
                              wire:model.debounce.500ms="licensePlate"
                              :placeholder="__('License Plate')"
                              :label="__('License Plate')"/>
        <div wire:loading wire:target="licensePlate" class="text-orange-500">
            {{ __('Getting information') }}
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-10 text-text">
        <div class="col-span-2 bg-primary p-6 flex flex-col lg:flex-wrap min-h-fit lg:h-80 gap-x-6">
            <x-advertisement.specification :title="__('Brand')">{{ $carData['brand'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Name')">{{ $carData['name'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Type')">{{ $carData['type'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('License plate')">{{ $carData['license_plate'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Build Year')">{{ $carData['build_year'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Color')">{{ $carData['color'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Doors')">{{ $carData['doors'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Seating')">{{ $carData['seating'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('APK expire date')">{{ $carData['apk_expire_date'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Kilometer')">{{ $carData['kilometer'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Fuel')">{{ $carData['fuel'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('BTW')">{{ $carData['btw'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Transmission')">{{ $carData['transmission'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Power')">{{ $carData['power'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Weight')">{{ $carData['weight'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Fuel usage')">{{ $carData['fuel_usage'] }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('Cylinder capacity')">{{ $carData['cylinder_capacity'] }}</x-advertisement.specification>
        </div>
        <div class="bg-primary p-6">
            <h2 class="font-bold text-xl text-center">
                {{ __("Extra's") }}
            </h2>
            <ul class="list-disc list-inside space-y-1">
                @for ($i = 0; $i < 5; $i++)
                    <li class="flex gap-x-2 items-center">
                        <x-form.input value="lorem ipsum" :placeholder="__('Extra specification')"/>
                        <x-delete-button/>
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

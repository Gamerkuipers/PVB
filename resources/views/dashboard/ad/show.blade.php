<x-app-layout>
    <div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-6 text-primary">
        {{-- Action bar --}}
        <div>
            <x-link-inverted :href="route('dashboard.ad.index')" class="w-fit">
                <x-icon.arrow-left></x-icon.arrow-left>
                {{ __('Alle advertenties') }}
            </x-link-inverted>
        </div>
        {{-- content --}}
        <h1 class="font-bold text-2xl">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. orem ipsum dolor sit amet, consectetur adipiscing elit.
        </h1>

        {{-- preview + info --}}
        <div class="grid md:grid-cols-2">
            <img src="{{ asset('images/img.png') }}" alt="">
            <div class="flex flex-col items-end p-4 text-2xl font-bold">
                <p>
                    Merk
                </p>
                <p>
                    €29.000,00
                </p>
            </div>
        </div>

        {{-- All images --}}
        <div>
            <div class="flex gap-4 overflow-x-auto">
                @for ($i = 0; $i < 20; $i++)
                    <img src="{{ asset('images/img.png') }}" alt="" class="w-32">
                @endfor
            </div>
        </div>

        {{-- specifications --}}
        <h2 class="font-bold text-4xl text-center">{{ __('Specifications') }}</h2>
        <div class="grid md:grid-cols-3 gap-10 text-text">
            <div class="col-span-2 bg-primary p-6 flex flex-col lg:flex-wrap min-h-fit lg:h-80 gap-x-6">
                <x-ad.specification :title="__('Brand')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Name')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Type')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('License plate')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Build Year')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Color')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Doors')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Seating')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('APK expire date')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Kilometer')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Fuel')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('BTW')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Transmission')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Power')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Weight')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Fuel usage')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Cylinder capacity')">Lorem Ipsum</x-ad.specification>
            </div>
            <div class="bg-primary p-6">
                <h2 class="font-bold text-xl text-center">
                    {{ __("Extra's") }}
                </h2>
                <ul class="list-disc list-inside">
                    @for ($i = 0; $i < 20; $i++)
                        <li>
                            Lorem Ipsum
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>

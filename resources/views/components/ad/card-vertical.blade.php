<div {{ $attributes->class(['bg-primary']) }}>
    <div class="relative">
        <img src="{{ asset('images/img.png') }}" alt="">
        <span class="absolute bottom-0 right-0 bg-primary px-4 py-2 rounded-tl-xl font-bold text-2xl">
                        €29.000,00
                    </span>
    </div>

    <div class="p-4 space-y-2">
        <h2 class="font-bold text-xl">
            orem ipsum dolor sit amet, consectetur adipiscing elit.
        </h2>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum risus urna, vel dapibus
            erat luctus in. Suspendisse potenti.
        </p>
        <div>
            <x-ad.specification :title="__('Brand')">Lorem Ipsum</x-ad.specification>
            <x-ad.specification :title="__('Name')">Lorem Ipsum</x-ad.specification>
            <x-ad.specification :title="__('License plate')">Lorem Ipsum</x-ad.specification>
            <x-ad.specification :title="__('Type')">Lorem Ipsum</x-ad.specification>
            <x-ad.specification :title="__('Kilometer')">Lorem Ipsum</x-ad.specification>
            <x-ad.specification :title="__('Fuel')">Lorem Ipsum</x-ad.specification>
            <x-ad.specification :title="__('BTW')">Lorem Ipsum</x-ad.specification>
        </div>
        <div class="flex justify-end">
            <x-link class="text-xl">
                {{ __('View ad') }}
                <x-icon.arrow-right></x-icon.arrow-right>
            </x-link>
        </div>
    </div>
</div>

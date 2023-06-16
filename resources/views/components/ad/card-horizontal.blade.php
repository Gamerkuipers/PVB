<div {{ $attributes->class(['bg-primary flex']) }}>
    <div class="relative w-3/4">
        <img src="{{ asset('images/img.png') }}" class="object-fit" alt="">
        <span class="absolute bottom-0 right-0 bg-primary px-4 py-2 rounded-tl-xl font-bold text-2xl">
            €29.000,00
        </span>
    </div>
    <div class="p-4 w-full flex flex-col gap-2 justify-between">
        <h2 class="font-bold text-xl">orem ipsum dolor sit amet, consectetur adipiscing elit. orem ipsum dolor sit amet, consectetur adipiscing elit.</h2>
        <div class="flex gap-x-10">
            <div>
                <x-ad.specification :title="__('Brand')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Name')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('License plate')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Type')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Kilometer')">Lorem Ipsum</x-ad.specification>
            </div>
            <div>
                <x-ad.specification :title="__('Fuel')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('BTW')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Transmission')">Lorem Ipsum</x-ad.specification>
                <x-ad.specification :title="__('Build Year')">Lorem Ipsum</x-ad.specification>
            </div>
        </div>

        <div class="flex justify-end">
            <x-link class="text-xl">
                {{ __('View ad') }}
                <x-icon.arrow-right></x-icon.arrow-right>
            </x-link>
        </div>
    </div>
</div>

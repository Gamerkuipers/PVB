<div {{ $attributes->class(['bg-primary flex flex-col']) }}>
    <div class="relative">
        @if($advertisement->thumbnail() != null)
            <img src="{{ asset("storage/{$advertisement->thumbnail()?->location}") }}" class="object-fill" alt="">
        @else
            <x-no-file-preview/>
        @endisset
        <span class="absolute bottom-0 right-0 bg-primary px-4 py-2 rounded-tl-xl font-bold text-2xl">
            €{{ $advertisement->price }}
        </span>
        @if($advertisement->trashed())
            <div class="absolute top-4 left-4">
                <x-advertisement.sold-tag/>
            </div>
        @endif
    </div>

    <div class="p-4 space-y-2 h-full flex flex-col justify-between">
        <h2 class="font-bold text-xl">
            {{ $advertisement->description }}
        </h2>
        <div>
            <x-advertisement.specification
                :title="__('Brand')">{{ $advertisement->brand }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('License plate')">{{ $advertisement->license_plate }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Type')">{{ $advertisement->type }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Kilometer')">{{ $advertisement->kilometer }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Fuel')">{{ $advertisement->fuel }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('BTW')">{{ $advertisement->btw }}</x-advertisement.specification>
        </div>
        <div class="flex justify-end">
            <x-link class="text-xl" :href="route('advertisement.show', $advertisement)">
                {{ __('View ad') }}
                <x-icon.arrow-right></x-icon.arrow-right>
            </x-link>
        </div>
    </div>
</div>

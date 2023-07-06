<div {{ $attributes->class(['bg-primary flex text-text lg:flex-row flex-col']) }}>
    <div class="relative lg:w-3/4">
        @if($advertisement->thumbnail() !== null)
            <img src="{{ asset("storage/{$advertisement->thumbnail()?->location}") }}" class="h-64 object-cover w-full"
                 alt="">
        @else
            <x-no-file-preview/>
        @endif
        <span class="absolute bottom-0 right-0 bg-primary px-4 py-2 rounded-tl-xl font-bold text-2xl">
            €{{ $advertisement->price }}
        </span>
    </div>
    <div class="p-4 w-full flex flex-col gap-2 justify-between">
        <h2 class="font-bold text-xl">{{ $advertisement->description }}</h2>
        <div class="grid lg:grid-cols-2 gap-x-10 w-full">
            <div>
                <x-advertisement.specification
                    :title="__('Brand')">{{ $advertisement->brand }}</x-advertisement.specification>
                <x-advertisement.specification
                    :title="__('License plate')">{{ $advertisement->license_plate }}</x-advertisement.specification>
                <x-advertisement.specification
                    :title="__('Type')">{{ $advertisement->type }}</x-advertisement.specification>
                <x-advertisement.specification
                    :title="__('Kilometer')">{{ $advertisement->kilometer }}</x-advertisement.specification>
            </div>
            <div>
                <x-advertisement.specification
                    :title="__('Fuel')">{{ $advertisement->fuel }}</x-advertisement.specification>
                <x-advertisement.specification
                    :title="__('BTW')">{{ $advertisement->btw }}</x-advertisement.specification>
                <x-advertisement.specification tion
                                               :title="__('Transmission')">{{ $advertisement->transmission }}</x-advertisement.specification>
                <x-advertisement.specification
                    :title="__('Build Year')">{{ $advertisement->build_year }}</x-advertisement.specification>
            </div>
        </div>

        <div class="flex justify-end">
            @isset($action)
                {{ $action }}
            @else
                <x-link class="text-xl" :href="route('advertisement.show', $advertisement)">
                    {{ __('View ad') }}
                    <x-icon.arrow-right></x-icon.arrow-right>
                </x-link>
            @endisset
        </div>
    </div>
</div>

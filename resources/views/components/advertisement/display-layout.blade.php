@props([
    'advertisement',
])
<div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-6 text-primary">
    {{-- Action bar --}}
    @isset($actions)
        {{ $actions }}
    @else
        <div class="flex justify-between items-center gap-2">
            <x-link-inverted :href="route('advertisement.index')" class="w-fit">
                <x-icon.arrow-left></x-icon.arrow-left>
                {{ __('Alle advertenties') }}
            </x-link-inverted>
        </div>
    @endisset
    {{-- content --}}
    @isset($description)
        {{ $description }}
    @else
        <h1 class="font-bold text-2xl">
            {{ $advertisement->description }}
        </h1>
    @endisset


    <div class="space-y-6"
         x-data="{currentPreview: '{{ asset("storage/{$advertisement->thumbnail()?->location}") }}'}">
        {{-- preview + info --}}
        <div class="grid md:grid-cols-2">
            @isset($previewImage)
                {{ $previewImage }}
            @else
                <img :src="currentPreview" alt="">
            @endisset
            <div class="flex flex-col items-end p-4 text-2xl font-bold">
                <p>
                    {{ $advertisement->brand }}
                </p>
                @isset($price)
                    {{ $price }}
                @else
                    <p>
                        €{{ $advertisement->price }}
                    </p>
                @endisset
            </div>
        </div>

        @isset($uploadSection)
            {{ $uploadSection }}
        @endisset

        {{-- All images --}}
        <div>
            <div class="flex gap-4 overflow-x-auto">

                @isset($previewSelection)
                    {{ $previewSelection }}
                @else
                    @foreach ($advertisement->files as $file)
                        <div class="cursor-pointer relative"
                             @click.prevent="currentPreview = '{{ asset("storage/$file->location") }}'">
                            <img src="{{ asset("storage/$file->location") }}" alt="" class="h-20 object-cover">
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>

    {{-- specifications --}}
    <div class="grid grid-cols-3 items-center justify-around">
        @isset($licensePlate)
            {{ $licensePlate }}
        @endisset
        <h2 class="font-bold text-4xl text-center col-start-2">{{ __('Specifications') }}</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-10 text-text">
        <div class="col-span-2 bg-primary p-6 flex flex-col lg:flex-wrap min-h-fit lg:h-80 gap-x-6">
            <x-advertisement.specification
                :title="__('Brand')">{{ $advertisement->brand }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Type')">{{ $advertisement->type }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('License plate')">{{ $advertisement->license_plate }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Build Year')">{{ $advertisement->build_year }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Color')">{{ $advertisement->color }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Doors')">{{ $advertisement->doors }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Seating')">{{ $advertisement->seating }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('APK expire date')">{{ $advertisement->apk_expire_date }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Kilometer')">{{ $advertisement->kilometer }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Fuel')">{{ $advertisement->fuel }}</x-advertisement.specification>
            <x-advertisement.specification :title="__('BTW')">{{ $advertisement->btw }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Transmission')">{{ $advertisement->transmission }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Power')">{{ $advertisement->power }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Weight')">{{ $advertisement->weight }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Fuel usage')">{{ $advertisement->fuel_usage }}</x-advertisement.specification>
            <x-advertisement.specification
                :title="__('Cylinder capacity')">{{ $advertisement->cylinder_capacity }}</x-advertisement.specification>
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

<x-app-layout>
    <div class="p-10">
        <div class="flex w-full justify-between">
            <h1 class="font-bold text-4xl">{{ __('About') }}</h1>

            {{-- Action group --}}
            <div class="flex items-center gap-4">
                <x-danger-button>{{ __('Cancel') }}</x-danger-button>
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
            </div>
        </div>
        <div class="">
            <div class="space-y-2 py-4">
                <div class="flex flex-col max-w-xl">
                    <x-form.label for="title">{{ __('Title') }}</x-form.label>
                    <x-form.input name="title" :placeholder="__('Title')" value="Over het bedrijf"/>
                </div>
            </div>
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">{{ __('Content') }}</h2>
                <textarea rows="15" class="text-lg pl-2 w-full">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Duis elementum risus urna, vel dapibus erat luctus in.
                    Suspendisse potenti. Aliquam erat volutpat.
                    Nam cursus lectus id nisi consequat, et scelerisque est pellentesque.
                    Morbi convallis elit quis magna scelerisque venenatis.
                    Aenean non ullamcorper mi, vel fringilla risus.
                    Morbi lacinia, sem in cursus dictum, lorem velit iaculis ligula,
                    rutrum ornare mi augue vel metus. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Nam aliquam ultrices magna sed ullamcorper.
                    Nunc urna neque, consectetur consectetur pellentesque eu, convallis a mauris.
                    Sed lacus dolor, vehicula in eleifend nec, tempus ac magna. Curabitur tristique ligula nibh,
                    vitae dictum enim facilisis pharetra. Vestibulum maximus, dolor ut euismod efficitur,
                    purus orci molestie leo, et dapibus purus purus et nulla.
                </textarea=>
            </div>
        </div>
    </div>
</x-app-layout>

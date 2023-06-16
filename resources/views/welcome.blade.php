<x-guest-layout>
    <div class="flex max-w-screen-2xl px-10 mx-auto gap-4 min-h-screen items-center">
        @for($i = 1; $i <= 3; $i++)
            <x-ad.card-vertical/>
        @endfor
    </div>
    <div class="bg-primary p-10" id="AboutTheCompany">
        <div class="max-w-7xl mx-auto space-y-6">
            <h2 class="font-bold text-4xl text-center text-secondary uppercase">{{ __('About the company') }}</h2>
            <div class="flex items-center gap-10 justify-between">
                <p class="text-xl">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum risus urna, vel dapibus erat
                    luctus in. Suspendisse potenti. Aliquam erat volutpat. Nam cursus lectus id nisi consequat, et
                    scelerisque est pellentesque. Morbi convallis elit quis magna scelerisque venenatis. Aenean non
                    ullamcorper mi, vel fringilla risus. Morbi lacinia, sem in cursus dictum, lorem velit iaculis
                    ligula,
                    rutrum ornare mi augue vel metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam
                    aliquam
                    ultrices magna sed ullamcorper. Nunc urna neque, consectetur consectetur pellentesque eu, convallis
                    a
                    mauris. Sed lacus dolor, vehicula in eleifend nec, tempus ac magna. Curabitur tristique ligula nibh,
                    vitae dictum enim facilisis pharetra. Vestibulum maximus, dolor ut euismod efficitur, purus orci
                    molestie leo, et dapibus purus purus et nulla.
                </p>
                <x-application-logo class="h-56 bg-text"></x-application-logo>
            </div>
        </div>
    </div>

    <div class="text-primary text-xl text-center flex flex-col items-center py-10 gap-10" id="Contact">
        <h2 class="font-bold text-4xl text-secondary uppercase">{{ __('Contact') }}</h2>
        <div class="space-y-4">
            <div>
                <p class="font-bold">Groningen</p>
                <p>Melkweg 2</p>
                <p>1234 HH Groningen</p>
            </div>
            <div class="grid text-end">
                <div class="grid grid-cols-2 gap-4">
                    <p class="font-bold text-secondary">
                        {{ __('Phone number') }}:
                    </p>
                    <p>
                        Lorem Ipsum
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <p class="font-bold text-secondary">
                        {{ __('Email') }}:
                    </p>
                    <p>
                        Lorem Ipsum
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

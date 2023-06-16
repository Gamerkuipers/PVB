<x-guest-layout>
    <div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-10">
        <h2 class="text-4xl font-bold uppercase text-center text-primary">{{ __('All ads') }}</h2>
        <div>
            <div class="divide-y-2 divide-primary">
                @for($i = 0; $i < 10; $i++)
                    <div class="py-5">
                        <x-ad.card-horizontal/>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</x-guest-layout>

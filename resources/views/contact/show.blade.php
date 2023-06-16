<x-app-layout>
    <div class="p-10">
        <div class="flex w-full justify-between">
            <h1 class="font-bold text-4xl">{{ __('Contact') }}</h1>

            {{-- Action group --}}
            <x-primary-button>{{ __('Edit') }}</x-primary-button>
        </div>
        <div class="divide-y-2 divide-primary w-fit">
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">Telefoon</h2>
                <p class="text-lg pl-2">06123456789</p>
            </div>
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">Email</h2>
                <p class="text-lg pl-2">Lorem@Ipsum.nl</p>
            </div>
        </div>
    </div>
</x-app-layout>

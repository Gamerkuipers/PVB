<x-app-layout>
    <div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-10">
        <div class="flex w-full justify-between">
            <h1 class="font-bold text-4xl">{{ __('About') }}</h1>

            @can('update', $about)
                {{-- Action group --}}
                <a href="{{ route('dashboard.about.edit') }}">
                    <x-primary-button>{{ __('Edit') }}</x-primary-button>
                </a>
            @endcan
        </div>
        <div class=" w-fit">
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">{{ __('Title') }}</h2>
                <p class="text-lg pl-2">{{ $about->head }}</p>
            </div>
            <div class="space-y-2 py-4">
                <h2 class="text-2xl font-bold">{{ __('Content') }}</h2>
                <p class="text-lg pl-2 whitespace-pre-line">{{ $about->body }}</p>
            </div>
        </div>
    </div>
</x-app-layout>

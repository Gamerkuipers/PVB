<x-app-layout>
    <div class="max-w-7xl mx-auto px-10 min-h-screen py-20">
        <div class="flex w-full justify-between">
            <h1 class="font-bold text-4xl">{{ __('Contact') }}</h1>

            {{-- Action group --}}
            @can('update', \App\Models\Contact::class)
                <a href="{{ route('dashboard.contact.edit') }}">
                    <x-primary-button>{{ __('Edit') }}</x-primary-button>
                </a>
            @endcan
        </div>
        <div class="divide-y-2 divide-primary w-fit">
            @foreach($contacts as $contact)
                <div class="space-y-2 py-4">
                    <h2 class="text-2xl font-bold">{{ $contact->name }}</h2>
                    <p class="text-lg pl-2">{{ $contact->body }}</p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>a

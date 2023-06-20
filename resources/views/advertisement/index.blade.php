<x-guest-layout>
    <div class="max-w-7xl mx-auto px-10 min-h-screen items-center py-20 space-y-10">
        <h2 class="text-4xl font-bold uppercase text-center text-primary">{{ __('All advertisements') }}</h2>
        <div>
            {{  $advertisements->links() }}
            <div class="divide-y-2 divide-primary">
                @forelse($advertisements as $advertisement)
                    <div class="py-5">
                        <x-advertisement.card.horizontal :advertisement="$advertisement"/>
                    </div>
                    @empty
                    <p>{{ __('There are currently no advertisements') }}</p>
                @endforelse
            </div>
            {{  $advertisements->links() }}
        </div>
    </div>
</x-guest-layout>

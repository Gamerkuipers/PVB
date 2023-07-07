<x-app-layout>
    <x-advertisement.display-layout :advertisement="$advertisement">
        <x-slot:actions>
            <div class="flex justify-between items-center gap-2">
                <x-link-inverted :href="route('dashboard.advertisement.index')" class="w-fit">
                    <x-icon.arrow-left></x-icon.arrow-left>
                    {{ __('Alle advertenties') }}
                </x-link-inverted>
                @can('update', $advertisement)
                    <a href="{{ route('dashboard.advertisement.edit', $advertisement) }}">
                        <x-secondary-button>{{ __('Edit') }}</x-secondary-button>
                    </a>
                @endcan
            </div>
        </x-slot:actions>
    </x-advertisement.display-layout>
</x-app-layout>

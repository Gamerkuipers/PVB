<nav class="bg-primary p-4 space-y-4 text-text z-50 h-full fixed top-0 left-0 flex flex-col justify-between">
    <div class="space-y-4">
        <x-nav-group-dashboard :title="__('Advertisement')">
            <x-slot:icon>
                <x-icon.book/>
            </x-slot:icon>
            @can('viewAny', \App\Models\Advertisement::class)
                <x-nav-link-dashboard route="dashboard.advertisement.index">
                    {{ __('List') }}
                </x-nav-link-dashboard>
            @endcan
            @can('create', \App\Models\Advertisement::class)
                <x-nav-link-dashboard route="dashboard.advertisement.create">
                    {{ __('Create') }}
                </x-nav-link-dashboard>
            @endcan
            @can('viewTrashed', \App\Models\Advertisement::class)
                <x-nav-link-dashboard route="dashboard.advertisement.sold">
                    {{ __('Sold') }}
                </x-nav-link-dashboard>
            @endcan
        </x-nav-group-dashboard>


        <x-nav-group-dashboard :title="__('About')">
            <x-slot:icon>
                <x-icon.info/>
            </x-slot:icon>
            @can('view', $about)
                <x-nav-link-dashboard route="dashboard.about.index">
                    {{ __('View') }}
                </x-nav-link-dashboard>
            @endcan
            @can('update', $about)
                <x-nav-link-dashboard route="dashboard.about.edit">
                    {{ __('Edit') }}
                </x-nav-link-dashboard>
            @endcan
        </x-nav-group-dashboard>

        <x-nav-group-dashboard :title="__('Contact')">
            <x-slot:icon>
                <x-icon.at-sign/>
            </x-slot:icon>
            @can('viewAny', \App\Models\Contact::class)
                <x-nav-link-dashboard route="dashboard.contact.index">
                    {{ __('View') }}
                </x-nav-link-dashboard>
            @endcan
            @can('update', \App\Models\Contact::class)
                <x-nav-link-dashboard route="dashboard.contact.edit">
                    {{ __('Edit') }}
                </x-nav-link-dashboard>
            @endcan
        </x-nav-group-dashboard>
    </div>
    <form class="flex gap-2 justify-end items-center cursor-pointer transition-transform duration-500 hover:-translate-x-3"
        method="POST" action="{{ route('logout') }}" x-data @click="$el.submit()">
        @csrf
        <span class="hidden md:block">{{ __('Log out') }}</span>
        <x-icon.log-out></x-icon.log-out>
    </form>
</nav>

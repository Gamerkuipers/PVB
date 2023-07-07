<nav class="bg-primary p-4 space-y-4 text-text z-50 h-full fixed top-0 left-0">
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
            @can('viewTrash', \App\Models\Advertisement::class)
                <x-nav-link-dashboard>
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
</nav>

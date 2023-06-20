<nav class="sm:w-1/5 bg-primary p-4 space-y-4 text-text z-50">
    <x-application-logo class="bg-text lg:w-5/6 hidden sm:block"></x-application-logo>

    <div class="space-y-4">
        <x-nav-group-dashboard :title="__('Advertisement')">
            <x-slot:icon>
                <x-icon.book />
            </x-slot:icon>
            <x-nav-link-dashboard route="dashboard.advertisement.index">
                {{ __('List') }}
            </x-nav-link-dashboard>
            <x-nav-link-dashboard route="dashboard.advertisement.create">
                {{ __('Create') }}
            </x-nav-link-dashboard>
            <x-nav-link-dashboard>
                {{ __('Sold') }}
            </x-nav-link-dashboard>
        </x-nav-group-dashboard>


        <x-nav-group-dashboard :title="__('About')">
            <x-slot:icon>
                <x-icon.info />
            </x-slot:icon>
            <x-nav-link-dashboard route="dashboard.about.index">
                {{ __('View') }}
            </x-nav-link-dashboard>
            <x-nav-link-dashboard>
                {{ __('Edit') }}
            </x-nav-link-dashboard>
        </x-nav-group-dashboard>

        <x-nav-group-dashboard :title="__('Contact')">
            <x-slot:icon>
                <x-icon.at-sign />
            </x-slot:icon>
            <x-nav-link-dashboard route="dashboard.contact.index">
                {{ __('View') }}
            </x-nav-link-dashboard>
            <x-nav-link-dashboard>
                {{ __('Edit') }}
            </x-nav-link-dashboard>
        </x-nav-group-dashboard>
    </div>
</nav>

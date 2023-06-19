<nav class="w-1/5 bg-primary p-4 space-y-4 text-text">
    <x-application-logo class="bg-text lg:w-5/6"></x-application-logo>
    <div class="space-y-2">
        <h2 class="text-2xl font-bold">{{ __('Advertisement') }}</h2>
        <div class="grid gap-1 pl-2">
            <x-nav-link-dashboard
            :href="route('dashboard.ad.index')"
            :active="request()->routeIs('dashboard.ad.index')"
        >
            {{ __('List') }}
        </x-nav-link-dashboard>
            <x-nav-link-dashboard
                :href="route('dashboard.ad.create')"
                :active="request()->routeIs('dashboard.ad.create')"
            >{{ __('Create') }}</x-nav-link-dashboard>
            <x-nav-link-dashboard>{{ __('Sold') }}</x-nav-link-dashboard>
        </div>
    </div>

    <div class="space-y-2">
        <h2 class="text-2xl font-bold">{{ __('About') }}</h2>
        <div class="grid gap-1 pl-2">
            <x-nav-link-dashboard
                :href="route('dashboard.about.index')"
                :active="request()->routeIs('dashboard.about.index')"
            >{{ __('View') }}</x-nav-link-dashboard>
            <x-nav-link-dashboard>{{ __('Edit') }}</x-nav-link-dashboard>
        </div>
    </div>

    <div class="space-y-2">
        <h2 class="text-2xl font-bold">{{ __('Contact') }}</h2>
        <div class="grid gap-1 pl-2">
            <x-nav-link-dashboard
                :href="route('dashboard.contact.index')"
                :active="request()->routeIs('dashboard.contact.index')"
            >
                {{ __('View') }}
            </x-nav-link-dashboard>
            <x-nav-link-dashboard>{{ __('Edit') }}</x-nav-link-dashboard>
        </div>
    </div>

</nav>

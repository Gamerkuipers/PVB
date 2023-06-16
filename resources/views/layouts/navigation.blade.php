<div class="fixed w-full z-50">
    <nav class="h-16 bg-primary flex px-4 py-1 justify-between">
        <a href="{{ route('home') }}" class="flex bg-text">
            <x-application-logo></x-application-logo>
        </a>

        <div class="flex items-center gap-6">
            <x-nav-link :href="route('ad.index')" :active="request()->routeIs('ad.index')">{{ __('All Ads') }}</x-nav-link>
            <x-nav-link :href="route('home') . '#AboutTheCompany'">{{ __('About the company') }}</x-nav-link>
            <x-nav-link :href="route('home') . '#Contact'">{{ __('Contact') }}</x-nav-link>
        </div>
    </nav>
</div>

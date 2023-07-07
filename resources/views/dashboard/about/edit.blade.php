<x-app-layout>
    <livewire:web-content.edit
        :webContent="$about"
        :title="__('About')"
        successRouteName="dashboard.about.index"
    />
</x-app-layout>

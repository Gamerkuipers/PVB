<div class="bg-gray-200 w-full h-72 flex flex-col items-center justify-center">
    <div class="text-gray-400">
        {{ __('No files have been uploaded') }}
    </div>
    <x-link class="!text-blue-500 hover:!text-secondary border-b-0" x-data @click="$dispatch('opennewfileuploads')">
        {{ __('Click here to upload') }}
    </x-link>
</div>

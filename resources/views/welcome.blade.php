<x-guest-layout>
    <div class="flex max-w-screen-2xl p-10 mx-auto min-h-screen items-center flex-col md:flex-row">
        <div class="flex gap-4 h-full">
            @foreach($advertisements as $advertisement)
                <x-advertisement.card.vertical :advertisement="$advertisement"/>
            @endforeach
        </div>
    </div>

    <x-about/>

    <div class="text-primary text-xl text-center flex flex-col items-center py-10 gap-10">
        <x-contact />
    </div>
</x-guest-layout>

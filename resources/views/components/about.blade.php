<div class="bg-primary p-10" id="AboutTheCompany">
    <div class="max-w-7xl mx-auto space-y-6">
        <h2 class="font-bold text-4xl text-center text-secondary uppercase">{{ $content->head }}</h2>
        <div class="flex items-center gap-10 justify-between flex-col-reverse md:flex-row">
            <p class="text-xl">
                {{ $content->body }}
            </p>
            <x-application-logo class="w-2/5 bg-text"></x-application-logo>
        </div>
    </div>
</div>

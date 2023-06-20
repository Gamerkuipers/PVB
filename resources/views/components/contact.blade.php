<div class="space-y-4">
    <h2 class="font-bold text-4xl text-secondary uppercase">{{ __('Contact') }}</h2>
        <div class="space-y-4">

            <div class="grid text-end">
                @foreach ($contacts as $contact)
                    <div class="flex justify-center gap-4 items-center">
                        @if(!empty($contact->name))
                            <p class="font-bold text-secondary">
                                {{ $contact->name }}:
                            </p>
                        @endif
                        <p>
                            {{ $contact->body }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
</div>

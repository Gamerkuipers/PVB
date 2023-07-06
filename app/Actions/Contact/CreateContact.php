<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CreateContact
{
    public function create(string $name, string $body): Contact|null
    {
        Gate::authorize('create', Contact::class);

        $validated = Validator::validate([
            'name' => $name,
            'body' => $body,
        ],[
            'name' => ['string', 'max:255'],
            'body' => ['required', 'string', 'max:255'],
        ]);

        return DB::transaction(fn() => Contact::create($validated));
    }
}

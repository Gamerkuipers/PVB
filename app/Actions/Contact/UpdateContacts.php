<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateContacts
{
    public function update(Collection $contacts): bool
    {
//        Gate::authorize('update', Contact::class);

        Validator::validate(['contacts' => $contacts->toArray()], [
            'contacts.*.name' => ['string', 'max:255'],
            'contacts.*.body' => ['required', 'string', 'max:255'],
        ], attributes: [
            'contacts.*.name' => 'Name',
            'contacts.*.body' => 'Content',
        ]);

        return (bool) DB::transaction(fn() => $contacts->each->save());
    }
}

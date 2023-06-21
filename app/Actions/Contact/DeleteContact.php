<?php

namespace App\Actions\Contact;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class DeleteContact
{
    public function deleteMany(Collection $contacts): bool|null
    {
        return (bool) DB::transaction(fn() => Contact::whereIn('id', $contacts->modelKeys())->delete());
    }
}

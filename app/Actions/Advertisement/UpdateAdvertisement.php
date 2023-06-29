<?php

namespace App\Actions\Advertisement;

use App\Models\Advertisement;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateAdvertisement
{
    public function update(Advertisement $advertisement): bool|Advertisement
    {
//        Gate::authorize('update', Advertisement::class);

        $validator = Validator::validate(['advertisement' => $advertisement->toArray()], [
            'advertisement.description' => ['required', 'string', 'max:65535'],
            'advertisement.price' => ['required', 'string', 'max:255'],
            'advertisement.license_plate' => ['required', 'string', 'max:255']
        ], attributes: [
            'advertisement.description' => 'description',
            'advertisement.price' => 'price',
            'advertisement.license_plate' => 'license plate'
        ]);

        return DB::transaction(fn() => $advertisement->save());
    }
}

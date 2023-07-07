<?php

namespace App\Actions\Advertisement;

use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CreateAdvertisement
{
    public function create(string $title, string $price, array $data, array $files): Advertisement|null
    {
        Gate::authorize('create', Advertisement::class);

        $fileAdder = new AddFilesToAdvertisement;

        $data = array_merge([
            'description' => $title,
            'price' => $price,
        ], $data);

        $validated = Validator::validate($data, [
            'description' => ['required', 'string', 'max:255'],
            'price' => ['required', 'string', 'max:255'],
            'brand' =>  ['required', 'string', 'max:255'],
            'name' =>  ['required', 'string', 'max:255'],
            'type' =>  ['required', 'string', 'max:255'],
            'license_plate' =>  ['required', 'string', 'max:255'],
            'build_year' =>  ['required', 'string', 'max:255'],
            'color' =>  ['required', 'string', 'max:255'],
            'doors' =>  ['required', 'string', 'max:255'],
            'seating' =>  ['required', 'string', 'max:255'],
            'apk_expire_date' =>  ['required', 'string', 'max:255'],
            'kilometer' =>  ['required', 'string', 'max:255'],
            'fuel' =>  ['required', 'string', 'max:255'],
            'btw' =>  ['required', 'string', 'max:255'],
            'transmission' =>  ['required', 'string', 'max:255'],
            'power' =>  ['required', 'string', 'max:255'],
            'weight' =>  ['required', 'string', 'max:255'],
            'fuel_usage' =>  ['required', 'string', 'max:255'],
            'cylinder_capacity' =>  ['required', 'string', 'max:255'],
        ]);

        $advertisement =  DB::transaction(fn() => Advertisement::create($validated));

        if(!$advertisement) return null;

        $fileAdder->addFiles($advertisement, collect($files));

        return $advertisement;
    }
}

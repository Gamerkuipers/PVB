<?php

namespace App\Actions\Advertisement;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateAdvertisement
{
    public function update(Advertisement $advertisement, bool $isSold, Collection $filesToDelete = new Collection, SupportCollection|array $newFiles = []): bool|Advertisement
    {
        Gate::authorize('update', $advertisement);

        $fileAdder = new AddFilesToAdvertisement;
        $fileRemover = new RemoveFilesFromAdvertisement;

        Validator::validate(['advertisement' => $advertisement->toArray()], [
            'advertisement.description' => ['required', 'string', 'max:65535'],
            'advertisement.price' => ['required', 'string', 'max:255'],
            'advertisement.license_plate' => ['required', 'string', 'max:255']
        ], attributes: [
            'advertisement.description' => 'description',
            'advertisement.price' => 'price',
            'advertisement.license_plate' => 'license plate'
        ]);

        $success = DB::transaction(fn() => $advertisement->save());

        if (!$success) return false;

        if ($filesToDelete->isNotEmpty()) $fileRemover->removeFiles($advertisement, $filesToDelete);

        $newFiles = is_array($newFiles) ? collect($newFiles) : $newFiles;

        $fileAdder->addFiles($advertisement, $newFiles);


        if($advertisement->trashed() != $isSold) {
            if($isSold && Gate::check('delete', $advertisement)) {
                $advertisement->delete();
            } elseif(Gate::check('restore', $advertisement)) {
                $advertisement->restore();
            }
        }

        return $advertisement;
    }
}

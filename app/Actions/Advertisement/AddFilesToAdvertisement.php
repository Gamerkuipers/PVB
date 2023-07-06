<?php

namespace App\Actions\Advertisement;

use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddFilesToAdvertisement
{
    public function addFiles(Advertisement &$advertisement, Collection $files): void
    {
        $fileValidator = Validator::make([], [
            'file' => ['image', 'max:10240'],
        ]);

        foreach ($files as $file) {
            $fileValidator->setData(['file' => $file]);

            if ($fileValidator->valid()) {
                $storedFileLocation = $file->store("advertisement/{$advertisement->id}", 'public');

                $fileObject = File::make([
                    'location' => $storedFileLocation,
                ]);

                DB::transaction(fn() => $advertisement->files()->save($fileObject));
            }
        }
    }
}

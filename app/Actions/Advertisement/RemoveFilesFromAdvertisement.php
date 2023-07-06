<?php

namespace App\Actions\Advertisement;

use App\Models\Advertisement;
use App\Models\File;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class RemoveFilesFromAdvertisement
{
    public function removeFiles(Advertisement &$advertisement, Collection $files): bool
    {
        $success = DB::transaction(fn() => $advertisement->files()->whereIn('id', $files->pluck('id'))->delete());

        if (!$success) return false;

        Storage::disk('public')->delete($files->pluck('location')->all());

        return true;
    }
}

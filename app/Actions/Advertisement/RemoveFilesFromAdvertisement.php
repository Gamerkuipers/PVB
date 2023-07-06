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
        $success = DB::transaction(fn() => File::destroy($files->pluck('id')));

        if (!$success) return false;

        Storage::delete($files->pluck('location'));

        return true;
    }
}

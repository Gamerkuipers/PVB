<?php

namespace App\Actions\WebContent;

use App\Models\WebContent;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class UpdateWebContent
{
    public function update(WebContent $content): bool|null
    {
//        Gate::authorize('update', $content);

        if($content->isClean()) return true;

        Validator::validate($content->getAttributes(), [
            'head' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string', 'max:65535'],
        ]);

        return DB::transaction(fn() => $content->save());
    }
}

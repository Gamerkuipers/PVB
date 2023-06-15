<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Ad extends Pivot
{
    use HasFactory;
    protected $guarded = [
        'id',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Advertisement extends Model
{
    use HasFactory,
        SoftDeletes;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'extras' => 'collection',
    ];

    public function files(): HasMany
    {
        return $this->hasMany(File::class);
    }

    public function thumbnail(): File|null
    {
        return $this->files->firstWhere('thumbnail', 1) ?? $this->files->first();
    }
}

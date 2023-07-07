<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebContent extends Model
{
    protected $fillable = [
        'key',
        'head',
        'body'
    ];
}

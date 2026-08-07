<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trophy extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'photo',
    ];
}

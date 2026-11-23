<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Opportunity extends Model
{
    protected $fillable = [
        'title',
        'type',
        'organization_name',
        'field',
        'deadline',
        'last_verified_at',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'last_verified_at' => 'datetime',
    ];
}
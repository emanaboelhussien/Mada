<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'entity_name',
        'entity_type',
        'website',
        'is_approved',
        'university',
        'major',
        'level',
        'bio',
        'portfolio',
        'phone',
        'is_visible',
        // حقول اختبار تحديد المستوى
        'exam_completed',
        'exam_track',
        'exam_score',
        'exam_level',
        'exam_completed_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_visible' => 'boolean',
            'is_approved' => 'boolean',
            'exam_completed' => 'boolean',
            'exam_completed_at' => 'datetime',
        ];
    }
}
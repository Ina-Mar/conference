<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'date',
        'location',
        'contact_person',
        'contact_email',
        'lecturers',
        'programme',
        'photo'
    ];
    protected $casts = [
        'lecturers' => 'array',
        'programme' => 'array',
    ];

    public function getId(): int
    {
        return $this->id;
    }
    public function participants() : BelongsToMany
    {
       return  $this->belongsToMany(User::class, 'registrations', 'conference_id', 'user_id');
    }

}

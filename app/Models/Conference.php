<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;


    protected $casts = [
        'lecturers' => 'array',
        'programme' => 'array',
    ];

    public function getId(): int
    {
        return $this->id;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cv extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'education',
        'work',
        'experience'
    ];

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class);
    }

}

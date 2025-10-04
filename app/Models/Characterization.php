<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Characterization extends Model
{
    use HasFactory;

    protected $fillable =[
        'ask',
        'characterizationType'
    ];

    public function almas():BelongsToMany
    {
        return $this->belongsToMany(Alma::class, 'alma_characterizations', 'id_alma', 'id_characterization')
        ->withPivot('answer')
        ->withTimestamps();
    }
}

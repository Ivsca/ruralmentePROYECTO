<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Workshop extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'title',
        'description',
        'participant',
        'duration',
        'location',
        'price',
        'eventType',
        'categoryEvent',
        'photo',
        'color'
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_workshops', 'id_user', 'id_workhop')
        ->wherePivot('dateCitations','timeCitations','amountOfPeople','Total', 'PayMethod', 'status')->withTimestamps();
    }
}

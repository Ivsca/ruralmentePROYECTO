<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'renewal',
        'id_membership',
    ];

    public function membership():BelongsTo
    {
        return $this->belongsTo(Membership::class, 'id_membership');
    }

    public function almas():HasMany
    {
        return $this->hasMany(Alma::class);
    }
}

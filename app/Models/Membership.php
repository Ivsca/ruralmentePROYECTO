<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Membership extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'producers',
        'platform',
        'fieldDay',
        'quantitySession',//cuantas sesiones son de estas para el usuario requerido
        'telepsychologies',//opcion de si o no
        'choiceType'
    ];

    public function subscriptions():HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Stmt\Return_;

class Alma extends Model
{
    use HasFactory;

    protected $fillable = [
        'civilStatus',
        'scholarship',
        'occupation',
        'corregimiento',
        'zoneType',
        'distribution',
        'stratum',
        'id_user',
        'id_category',
        'id_subscription',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(category::class, 'id_category');
    }

    public function characterizations():BelongsToMany
    {
        return $this->belongsToMany(Characterization::class, 'alma_characterizations', 'id_alma', 'id_characterization')
        ->withPivot('answer')
        ->withTimestamps();
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function subscription():BelongsTo
    {
        return $this->belongsTo(Subscription::class, 'id_subscription');
    }
}

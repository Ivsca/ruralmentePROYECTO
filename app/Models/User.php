<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $fillable = [
        'document',
        'documentType',
        'NombreCompleto',
        'birthDate',
        'phone',
        'country',
        'department',
        'city',
        'address',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];

    // Relaciones
    public function alma(): HasOne
    {
        return $this->hasOne(Alma::class, 'id_user', 'id');
    }


   


    public function workshops(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_workshops', 'id_user', 'id_workhop')
            ->wherePivot('dateTimeCitations');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }


    // Relación con triajes
    public function triajes(): HasMany
    {
        return $this->hasMany(Triaje::class);
    }

    
    public function isAdmin(): bool
    {
        
        if ($this->role === 'admin') {
            return true;
        }

        
        if ($this->hasRole('admin')) {
            return true;
        }

        return false;
    }
}
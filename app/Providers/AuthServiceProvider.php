<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Triaje;
use App\Policies\TriajePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Triaje::class => TriajePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
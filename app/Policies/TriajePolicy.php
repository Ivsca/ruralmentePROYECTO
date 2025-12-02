<?php

namespace App\Policies;

use App\Models\Triaje;
use App\Models\User;

class TriajePolicy
{
    public function view(User $user, Triaje $triaje)
    {
        return $user->id === $triaje->user_id;
    }

    public function update(User $user, Triaje $triaje)
    {
        return $user->id === $triaje->user_id;
    }

    public function delete(User $user, Triaje $triaje)
    {
        return $user->id === $triaje->user_id;
    }
}
<?php

namespace App\Repositories;

use App\User;
use App\Institution;

class InstitutionRepository
{
    /**
     * Get all of the tasks for a given user.
     *
     * @param  Institution  $institution
     * @return Collection
     */
    public function forUser(User $user)
    {
        return Task::where('user_id', $user->id)
                    ->orderBy('created_at', 'asc')
                    ->get();
    }
}

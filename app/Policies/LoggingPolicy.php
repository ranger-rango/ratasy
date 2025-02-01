<?php

namespace App\Policies;

use App\Models\Logging;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LoggingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Logging $logging)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Logging $log)
    {
        // return $log->$user->is($user);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Logging $logging)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Logging $logging)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Logging $logging)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Logging $logging)
    {
        //
    }
}

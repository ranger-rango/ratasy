<?php

namespace App\Policies;

use App\Models\OperatingExpense;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class OperatingExpensePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, OperatingExpense $operatingExpense): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, OperatingExpense $operatingExpense): bool
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, OperatingExpense $operatingExpense): bool
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, OperatingExpense $operatingExpense): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, OperatingExpense $operatingExpense): bool
    {
        //
    }
}

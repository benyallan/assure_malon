<?php

namespace App\Policies;

use App\Models\Hotel;
use App\Models\User;

class HotelPolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdministrator()) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('hotel.view-any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.view');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('hotel.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.delete');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.delete-any');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.restore');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.restore-any');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.force-delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(User $user, Hotel $hotel): bool
    {
        return $user->hasPermission('hotel.force-delete-any');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function reorder(User $user): bool
    {
        return $user->hasPermission('hotel.reorder');
    }
}

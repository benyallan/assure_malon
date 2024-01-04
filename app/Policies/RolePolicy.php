<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RolePolicy
{
    /**
     * Perform pre-authorization checks.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdministrator) {
            return true;
        }

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermission('role.read');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Role $role): bool
    {
        return $user->hasPermission('role.read');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('role.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Role $role): bool
    {
        return $user->hasPermission('role.update');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Role $role): bool
    {
        return $user->hasPermission('role.delete');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function  deleteAny(User $user, Role $role): bool
    {
        return $user->hasPermission('role.delete-any');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Role $role): bool
    {
        return $user->hasPermission('role.restore');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(User $user, Role $role): bool
    {
        return $user->hasPermission('role.restore-any');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Role $role): bool
    {
        return $user->hasPermission('role.force-delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(User $user, Role $role): bool
    {
        return $user->hasPermission('role.force-delete-any');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function reorder(User $user): bool
    {
        return $user->hasPermission('role.reorder');
    }
}

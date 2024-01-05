<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
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
        return $user->hasPermission('user.view-any');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, User $model): bool
    {
        return $user->hasPermission('user.view') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermission('user.create');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, User $model): bool
    {
        return $user->hasPermission('role.update') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->hasPermission('role.delete') || $user->id === $model->id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function deleteAny(User $user, User $model): bool
    {
        return $user->hasPermission('user.delete-any');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, User $model): bool
    {
        return $user->hasPermission('user.restore');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restoreAny(User $user, User $model): bool
    {
        return $user->hasPermission('user.restore-any');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, User $model): bool
    {
        return $user->hasPermission('user.force-delete');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDeleteAny(User $user, User $model): bool
    {
        return $user->hasPermission('user.force-delete-any');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function reorder(User $user): bool
    {
        return $user->hasPermission('user.reorder');
    }
}

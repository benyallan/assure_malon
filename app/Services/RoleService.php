<?php

namespace App\Services;

use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;

class RoleService
{
    public function createRole(array $data): Role
    {
        return Role::create($data);
    }

    public function findRole(string $id): Role
    {
        return Role::findOrFail($id);
    }

    public function listRoles(): Collection
    {
        return Role::all();
    }

    public function updateRole(Role $role, array $data): Role
    {
        $role->update($data);

        return $role;
    }

    public function deleteRole(Role $role): void
    {
        $role->delete();
    }

    public function forceDeleteRole(Role $role): void
    {
        $role->forceDelete();
    }
}

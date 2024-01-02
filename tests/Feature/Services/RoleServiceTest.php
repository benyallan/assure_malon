<?php

use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

beforeEach(function () {
    $this->roleService = new RoleService();

    $this->data = [
        'name' => 'Role Test',
        'slug' => 'role-test',
        'description' => 'role description',
    ];
});

it('list all roles', function () {
    Role::factory(3)->create();

    $result = $this->roleService->listRoles();

    expect($result)->toHaveCount(3);

    expect($result)->toBeInstanceOf(Collection::class);

    foreach ($result as $role) {
        expect($role)->toBeInstanceOf(Role::class);
    }
});

it('creates a role', function () {
    $result = $this->roleService->createRole($this->data);

    expect(Arr::except($result->toArray(), ['id', 'created_at', 'deleted_at', 'updated_at']))
        ->toEqual($this->data);
});

it('show a role', function () {
    $role = Role::factory()->create();

    $result = $this->roleService->findRole($role->id);

    expect(Arr::except($result->toArray(), ['created_at', 'deleted_at']))->toEqual(Arr::except($role->toArray(), ['created_at', 'deleted_at']));
});

it('update a role', function () {
    $role = Role::factory()->create();

    $result = $this->roleService->updateRole($role, $this->data);

    expect(Arr::except($result->toArray(), ['id', 'created_at', 'deleted_at', 'updated_at']))
        ->toEqual($this->data);
});

it('soft deletes a role', function () {
    $role = Role::factory()->create();

    $this->roleService->deleteRole($role);

    $this->assertSoftDeleted('roles', ['id' => $role->id]);
});

it('force deletes a role', function () {
    $role = Role::factory()->create();

    $this->roleService->forceDeleteRole($role);

    $this->assertDatabaseMissing('roles', ['id' => $role->id]);
});

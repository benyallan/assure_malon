<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\PermissionSeeder;

beforeEach(function () {
    $this->seed(PermissionSeeder::class);
});

it('allows users with role.view-any permission to view any roles', function () {
    $user = User::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.view-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.view-any');

    expect($rolePolicy->viewAny($user))->toBeTrue();
});

it('allows users with role.view permission to view a specific role', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.view')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.view');

    expect($rolePolicy->view($user, $role))->toBeTrue();
});

it('allows users with role.create permission to create roles', function () {
    $user = User::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.create')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.create');

    expect($rolePolicy->create($user))->toBeTrue();
});

it('allows users with role.update permission to update roles', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.update')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.update');

    expect($rolePolicy->update($user, $role))->toBeTrue();
});

it('allows users with role.delete permission to delete roles', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.delete')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.delete');

    expect($rolePolicy->delete($user, $role))->toBeTrue();
});

it('allows users with role.delete-any permission to delete any roles', function () {
    $user = User::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.delete-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.delete-any');

    expect($rolePolicy->deleteAny($user, Role::factory()->create()))->toBeTrue();
});

it('allows users with role.restore permission to restore roles', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.restore')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.restore');

    expect($rolePolicy->restore($user, $role))->toBeTrue();
});

it('allows users with role.restore-any permission to restore any roles', function () {
    $user = User::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.restore-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.restore-any');

    expect($rolePolicy->restoreAny($user, Role::factory()->create()))->toBeTrue();
});

it('allows users with role.force-delete permission to force delete roles', function () {
    $user = User::factory()->create();
    $role = Role::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.force-delete')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.force-delete');

    expect($rolePolicy->forceDelete($user, $role))->toBeTrue();
});

it('allows users with role.force-delete-any permission to force delete any roles', function () {
    $user = User::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.force-delete-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.force-delete-any');

    expect($rolePolicy->forceDeleteAny($user, Role::factory()->create()))->toBeTrue();
});

it('allows users with role.reorder permission to reorder roles', function () {
    $user = User::factory()->create();
    $rolePolicy = new \App\Policies\RolePolicy();
    $permission = Permission::where('name', 'role.reorder')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('role.reorder');

    expect($rolePolicy->reorder($user))->toBeTrue();
});

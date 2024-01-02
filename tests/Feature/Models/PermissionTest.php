<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

it('can be created with valid attributes', function () {
    $permission = Permission::factory()->create();

    expect($permission->id)->toBeUuid();
    expect($permission->name)->toBeString()->not()->toBeEmpty();
});

it('can be associated with users and roles', function () {
    $permission = Permission::factory()->create();
    $user = User::factory()->create();
    $role = Role::factory()->create();

    $permission->users()->attach($user);
    $permission->roles()->attach($role);

    expect($permission->users)->toHaveCount(1, 'Permission should be associated with one user.');
    expect($permission->users->first())->toBeInstanceOf(User::class);

    expect($permission->roles)->toHaveCount(1, 'Permission should be associated with one role.');
    expect($permission->roles->first())->toBeInstanceOf(Role::class);
});

it('has fillable attributes', function () {
    $permission = new Permission();

    expect($permission->getGuarded())->toEqual(['id']);
});

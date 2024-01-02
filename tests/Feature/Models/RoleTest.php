<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

it('can be created with valid attributes', function () {
    $role = Role::factory()->create();

    expect($role->id)->toBeUuid();
    expect($role->name)->toBeString()->not()->toBeEmpty();
});

it('can have users and permissions', function () {
    $role = Role::factory()->create();
    $user = User::factory()->create();
    $permission = Permission::factory()->create();

    $role->users()->attach($user);
    $role->permissions()->attach($permission);

    expect($role->users)->toHaveCount(1, 'Role should have one user.');
    expect($role->users->first())->toBeInstanceOf(User::class);

    expect($role->permissions)->toHaveCount(1, 'Role should have one permission.');
    expect($role->permissions->first())->toBeInstanceOf(Permission::class);
});

it('has guarded attributes', function () {
    $role = new Role();

    expect($role->getGuarded())->toEqual(['id']);
});

it('casts attributes', function () {
    $role = new Role();
    $expectedCasts = [
        'deleted_at' => 'datetime',
    ];

    expect($role->getCasts())->toEqual($expectedCasts);
});

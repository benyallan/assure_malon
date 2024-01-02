<?php

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;

describe('User', function () {
    it('can be created with valid attributes', function () {
        $user = User::factory()->create();

        expect($user->id)->toBeUuid();
        expect($user->name)->toBeString()->not()->toBeEmpty();
        expect($user->email)->toBeString()->not()->toBeEmpty()->toMatch('/^.+@.+\..+$/');
    });

    it('can have roles and permissions', function () {
        $user = User::factory()->create();
        $role = Role::factory()->create();
        $permission = Permission::factory()->create();

        $user->roles()->attach($role);
        $user->permissions()->attach($permission);

        expect($user->roles)->toHaveCount(1, 'User should have one role.');
        expect($user->roles->first())->toBeInstanceOf(Role::class);

        expect($user->permissions)->toHaveCount(1, 'User should have one permission.');
        expect($user->permissions->first())->toBeInstanceOf(Permission::class);
    });

    it('has fillable attributes', function () {
        $user = new User();
        expect($user->getFillable())->toEqual(['name', 'email', 'password']);
    });

    it('hides sensitive attributes', function () {
        $user = new User();
        expect($user->getHidden())->toEqual(['password', 'remember_token', 'two_factor_recovery_codes', 'two_factor_secret']);
    });

    it('casts attributes', function () {
        $user = new User();
        $expectedCasts = [
            'email_verified_at' => 'datetime',
            'deleted_at' => 'datetime',
        ];

        expect($user->getCasts())->toEqual($expectedCasts);
    });

    it('checks if the user has a permission directly or via role', function () {
        $userPermission = Permission::factory()->create(['name' => 'user_permission']);
        $rolePermission = Permission::factory()->create(['name' => 'role_permission']);

        $user = User::factory()->create();

        expect($user->hasPermission('user_permission'))->toBeFalse();

        $user->permissions()->attach($userPermission);

        expect($user->hasPermission('user_permission'))->toBeTrue();

        $role = Role::factory()->create();

        $role->permissions()->attach($rolePermission);

        $user->roles()->attach($role);

        expect($user->hasPermission('role_permission'))->toBeTrue();
    });
});

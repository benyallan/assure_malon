<?php

use App\Models\Permission;
use App\Models\User;
use Database\Seeders\PermissionSeeder;

beforeEach(function () {
    $this->seed(PermissionSeeder::class);
});

it('allows users with user.view-any permission to view any users', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.view-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.view-any');

    expect($userPolicy->viewAny($user))->toBeTrue();
});

it('allows users with user.view permission to view a specific user', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.view')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.view');

    expect($userPolicy->view($user, $user))->toBeTrue();
});

it('allows a user without user.view permission to view their own data', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();

    expect($userPolicy->view($user, $user))->toBeTrue();
});

it('does not allow a user without user.view permission to view another user', function () {
    $user = User::factory()->create();
    $user2 = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();

    expect($userPolicy->view($user, $user2))->toBeFalse();
});

it('allows users with user.create permission to create users', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.create')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.create');

    expect($userPolicy->create($user))->toBeTrue();
});

it('allows users with user.update permission to update users', function () {
    $user = User::factory()->create();
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.update')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.update');

    expect($userPolicy->update($user, $user))->toBeTrue();
});

it('allows users with user.delete permission to delete users', function () {
    $user = User::factory()->create();
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.delete')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.delete');

    expect($userPolicy->delete($user, $user))->toBeTrue();
});

it('allows users with user.delete-any permission to delete any users', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.delete-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.delete-any');

    expect($userPolicy->deleteAny($user, User::factory()->create()))->toBeTrue();
});

it('allows users with user.restore permission to restore users', function () {
    $user = User::factory()->create();
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.restore')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.restore');

    expect($userPolicy->restore($user, $user))->toBeTrue();
});

it('allows users with user.restore-any permission to restore any users', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.restore-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.restore-any');

    expect($userPolicy->restoreAny($user, User::factory()->create()))->toBeTrue();
});

it('allows users with user.force-delete permission to force delete users', function () {
    $user = User::factory()->create();
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.force-delete')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.force-delete');

    expect($userPolicy->forceDelete($user, $user))->toBeTrue();
});

it('allows users with user.force-delete-any permission to force delete any users', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.force-delete-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.force-delete-any');

    expect($userPolicy->forceDeleteAny($user, User::factory()->create()))->toBeTrue();
});

it('allows users with user.reorder permission to reorder users', function () {
    $user = User::factory()->create();
    $userPolicy = new \App\Policies\UserPolicy();
    $permission = Permission::where('name', 'user.reorder')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('user.reorder');

    expect($userPolicy->reorder($user))->toBeTrue();
});

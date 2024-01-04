<?php

use App\Models\Permission;
use App\Models\Hotel;
use App\Models\User;
use Database\Seeders\PermissionSeeder;

beforeEach(function () {
    $this->seed(PermissionSeeder::class);
});

it('allows users with hotel.view-any permission to view any hotels', function () {
    $user = User::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.view-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.view-any');

    expect($hotelPolicy->viewAny($user))->toBeTrue();
});

it('allows users with hotel.view permission to view a specific hotel', function () {
    $user = User::factory()->create();
    $hotel = Hotel::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.view')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.view');

    expect($hotelPolicy->view($user, $hotel))->toBeTrue();
});

it('allows users with hotel.create permission to create hotels', function () {
    $user = User::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.create')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.create');

    expect($hotelPolicy->create($user))->toBeTrue();
});

it('allows users with hotel.update permission to update hotels', function () {
    $user = User::factory()->create();
    $hotel = Hotel::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.update')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.update');

    expect($hotelPolicy->update($user, $hotel))->toBeTrue();
});

it('allows users with hotel.delete permission to delete hotels', function () {
    $user = User::factory()->create();
    $hotel = Hotel::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.delete')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.delete');

    expect($hotelPolicy->delete($user, $hotel))->toBeTrue();
});

it('allows users with hotel.delete-any permission to delete any hotels', function () {
    $user = User::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.delete-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.delete-any');

    expect($hotelPolicy->deleteAny($user, Hotel::factory()->create()))->toBeTrue();
});

it('allows users with hotel.restore permission to restore hotels', function () {
    $user = User::factory()->create();
    $hotel = Hotel::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.restore')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.restore');

    expect($hotelPolicy->restore($user, $hotel))->toBeTrue();
});

it('allows users with hotel.restore-any permission to restore any hotels', function () {
    $user = User::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.restore-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.restore-any');

    expect($hotelPolicy->restoreAny($user, Hotel::factory()->create()))->toBeTrue();
});

it('allows users with hotel.force-delete permission to force delete hotels', function () {
    $user = User::factory()->create();
    $hotel = Hotel::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.force-delete')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.force-delete');

    expect($hotelPolicy->forceDelete($user, $hotel))->toBeTrue();
});

it('allows users with hotel.force-delete-any permission to force delete any hotels', function () {
    $user = User::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.force-delete-any')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.force-delete-any');

    expect($hotelPolicy->forceDeleteAny($user, Hotel::factory()->create()))->toBeTrue();
});

it('allows users with hotel.reorder permission to reorder hotels', function () {
    $user = User::factory()->create();
    $hotelPolicy = new \App\Policies\HotelPolicy();
    $permission = Permission::where('name', 'hotel.reorder')->firstOrFail();

    $user->permissions()->attach($permission);
    $user->hasPermission('hotel.reorder');

    expect($hotelPolicy->reorder($user))->toBeTrue();
});

<?php

use App\Filament\Resources\UserResource;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->actingAs(User::factory()->administrator()->create());
});


it('can list posts', function () {
    $users = User::factory()->count(9)->create();

    foreach ($users as $user) {
        Livewire::test(UserResource\Pages\ListUsers::class)->assertSee($user->name);
    }
});

it('can render page', function () {
    Livewire::test(UserResource\Pages\ListUsers::class)->assertOk();
});

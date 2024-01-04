<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions for role CRUD
        Permission::create(['name' => 'role.create', 'slug' => 'role-create', 'description' => 'Create Role']);
        Permission::create(['name' => 'role.view', 'slug' => 'role-read', 'description' => 'Read Role']);
        Permission::create(['name' => 'role.view-any', 'slug' => 'role-read', 'description' => 'Read Role']);
        Permission::create(['name' => 'role.update', 'slug' => 'role-update', 'description' => 'Update Role']);
        Permission::create(['name' => 'role.restore', 'slug' => 'role-restore', 'description' => 'Restore Role']);
        Permission::create(['name' => 'role.restore-any', 'slug' => 'role-restore-any', 'description' => 'Restore Any Roles']);
        Permission::create(['name' => 'role.delete', 'slug' => 'role-delete', 'description' => 'Delete Role']);
        Permission::create(['name' => 'role.delete-any', 'slug' => 'role-delete-any', 'description' => 'Delete Any Roles']);
        Permission::create(['name' => 'role.force-delete', 'slug' => 'role-force-delete', 'description' => 'Force Delete Role']);
        Permission::create(['name' => 'role.force-delete-any', 'slug' => 'role-force-delete-any', 'description' => 'Force Delete Any Roles']);
        Permission::create(['name' => 'role.reorder', 'slug' => 'role-reorder', 'description' => 'Reorder Roles']);

        // Create permissions for hotel CRUD
        Permission::create(['name' => 'hotel.create', 'slug' => 'hotel-create', 'description' => 'Create Hotel']);
        Permission::create(['name' => 'hotel.read', 'slug' => 'hotel-read', 'description' => 'Read Hotel']);
        Permission::create(['name' => 'hotel.update', 'slug' => 'hotel-update', 'description' => 'Update Hotel']);
        Permission::create(['name' => 'hotel.restore', 'slug' => 'hotel-restore', 'description' => 'Restore Hotel']);
        Permission::create(['name' => 'hotel.delete', 'slug' => 'hotel-delete', 'description' => 'Delete Hotel']);
        Permission::create(['name' => 'hotel.force-delete', 'slug' => 'hotel-force-delete', 'description' => 'Force Delete Hotel']);
    }
}

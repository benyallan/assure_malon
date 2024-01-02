<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Criar permissões para o CRUD de hotéis
        Permission::create(['name' => 'hotel.create', 'slug' => 'hotel-create', 'description' => 'Criar Hotel']);
        Permission::create(['name' => 'hotel.read', 'slug' => 'hotel-read', 'description' => 'Ler Hotel']);
        Permission::create(['name' => 'hotel.update', 'slug' => 'hotel-update', 'description' => 'Atualizar Hotel']);
        Permission::create(['name' => 'hotel.delete', 'slug' => 'hotel-delete', 'description' => 'Excluir Hotel']);
        Permission::create(['name' => 'hotel.force-delete', 'slug' => 'hotel-force-delete', 'description' => 'Excluir Hotel (forçado)']);
    }
}

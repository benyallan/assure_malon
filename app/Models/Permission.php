<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Permission extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function users(): MorphToMany
    {
        return $this->morphedByMany(User::class, 'permissionable', 'permission_permissionable');
    }

    public function roles(): MorphToMany
    {
        return $this->morphedByMany(Role::class, 'permissionable', 'permission_permissionable');
    }
}

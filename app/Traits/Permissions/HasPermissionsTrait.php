<?php
namespace App\Traits\Permissions;

use App\Models\{Role,Permission};

trait HasPermissionsTrait
{
    /**
     * @return mixed
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class,'users_roles');
    }

    /**
     * @return mixed
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }

    /**
     * @param mixed ...$roles
     */
    public function hasRole(...$roles)
    {
        dd($roles);
    }

}

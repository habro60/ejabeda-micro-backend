<?php

namespace App\Traits;

trait HasPermissions
{
    /**
     * Check if the user has the specified permission.
     *
     * @param string $permission
     * @return bool
     */
    public function hasPermission($permission): bool
    {
        return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    }
}

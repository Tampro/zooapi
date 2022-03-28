<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;

class RolePolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        if ($user->hasRole('admin-root') || $user->can('manage roles')) {
            return true;
        }
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  App\Models\User $user
     * @param  App\Models\Role $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        if ($this->touch($user)) {
            return true;
        }
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($this->touch($user)) {
            return true;
        }
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  App\Models\User $user
     * @param  App\Models\Role $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        if ($this->touch($user)) {
            return true;
        }
    }

    /**
     * Determine whether the user can delete the role.
     *
     * @param  App\Models\User $user
     * @param  App\Models\Role $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        if ($this->touch($user)) {
            return true;
        }
    }

    /**
     * Determine whether the user can perform any action on the model.
     *
     * @param  App\Models\User $user
     * @return mixed
     */
    public function touch(User $user)
    {
        if ($user->can('manage roles')) {
            return true;
        }
    }
}

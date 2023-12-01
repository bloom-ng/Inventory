<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Location;
use Illuminate\Auth\Access\HandlesAuthorization;

class LocationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the location can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list locations');
    }

    /**
     * Determine whether the location can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Location  $model
     * @return mixed
     */
    public function view(User $user, Location $model)
    {
        return $user->hasPermissionTo('view locations');
    }

    /**
     * Determine whether the location can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create locations');
    }

    /**
     * Determine whether the location can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Location  $model
     * @return mixed
     */
    public function update(User $user, Location $model)
    {
        return $user->hasPermissionTo('update locations');
    }

    /**
     * Determine whether the location can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Location  $model
     * @return mixed
     */
    public function delete(User $user, Location $model)
    {
        return $user->hasPermissionTo('delete locations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Location  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete locations');
    }

    /**
     * Determine whether the location can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Location  $model
     * @return mixed
     */
    public function restore(User $user, Location $model)
    {
        return false;
    }

    /**
     * Determine whether the location can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Location  $model
     * @return mixed
     */
    public function forceDelete(User $user, Location $model)
    {
        return false;
    }
}

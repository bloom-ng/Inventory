<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ItemLocation;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemLocationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the itemLocation can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list itemlocations');
    }

    /**
     * Determine whether the itemLocation can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemLocation  $model
     * @return mixed
     */
    public function view(User $user, ItemLocation $model)
    {
        return $user->hasPermissionTo('view itemlocations');
    }

    /**
     * Determine whether the itemLocation can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create itemlocations');
    }

    /**
     * Determine whether the itemLocation can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemLocation  $model
     * @return mixed
     */
    public function update(User $user, ItemLocation $model)
    {
        return $user->hasPermissionTo('update itemlocations');
    }

    /**
     * Determine whether the itemLocation can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemLocation  $model
     * @return mixed
     */
    public function delete(User $user, ItemLocation $model)
    {
        return $user->hasPermissionTo('delete itemlocations');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemLocation  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete itemlocations');
    }

    /**
     * Determine whether the itemLocation can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemLocation  $model
     * @return mixed
     */
    public function restore(User $user, ItemLocation $model)
    {
        return false;
    }

    /**
     * Determine whether the itemLocation can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemLocation  $model
     * @return mixed
     */
    public function forceDelete(User $user, ItemLocation $model)
    {
        return false;
    }
}

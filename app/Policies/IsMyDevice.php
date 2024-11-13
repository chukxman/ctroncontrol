<?php

namespace App\Policies;

use App\Models\Device;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IsMyDevice
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return mixed
     */
    public function view(User $user, Device $device)
    {
        return $user->id === $device->user_id || $user->id === $device->engineer_id
            ? Response::allow()
            : Response::deny('The device is not yours');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return mixed
     */
    public function update(User $user, Device $device)
    {
        return $user->id === $device->user_id
            ? Response::allow()
            : Response::deny('The device is not yours');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return mixed
     */
    public function delete(User $user, Device $device)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return mixed
     */
    public function restore(User $user, Device $device)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Device  $device
     * @return mixed
     */
    public function forceDelete(User $user, Device $device)
    {
        //
    }
}

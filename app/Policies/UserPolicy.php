<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view any models.
     */

     public function isAdmin()
    {
       return auth()->user()->role == 'admin';
    }

    public function isComps()
    {
       return auth()->user()->role == 'comps' || auth()->user()->role == 'admin';
    }

    public function isSur()
    {
       return auth()->user()->role == 'sur';
    }

    public function isDir()
    {
       return auth()->user()->role == 'dir' || auth()->user()->role == 'admin';
    }

/*
    public function viewAny(User $user): bool
    {
        //
    }


    
    public function view(User $user, User $model): bool
    {
        //
    }


    
    public function create(User $user): bool
    {
        //
    }


    public function update(User $user, User $model): bool
    {
        //
    }


    public function delete(User $user, User $model): bool
    {
        //
    }

    
    public function restore(User $user, User $model): bool
    {
        //
    }

    
    public function forceDelete(User $user, User $model): bool
    {
        //
    }

*/
}

<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Gate as Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

     protected $policies = [
        User::class => UserPolicyPolicy::class,
        Etudiant::class => EtudiantPolicy::class,
        Parentt::class => ParenttPolicy::class,
    ];

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
        Gate::before(function ($user, $ability) {
            if ($user->role === 'super admin') {
                return true; // Super admin can bypass other checks
            }
        });

        Gate::define('comps', [UserPolicy::class, 'isComps']);
        Gate::define('sur', [UserPolicy::class, 'isSur']);
      //  Gate::define('dir', [UserPolicy::class, 'isDir']);

        Gate::define('dir', function ($user) {
            return $user->role === 'dir' || $user->role === 'admin' ;
        });

        Gate::define('admin', function ($user) {
            return $user->role === 'admin' ;
        });

        Gate::define('prof', function ($user) {
            return $user->role === 'prof' ;
        });

      Gate::define('parent', function ($user) {
            return $user->role == 'parent' and $user->wh ;
        });

        

        Gate::define('dir_or_prof', function ($user) {
            return $user->role === 'dir' || $user->role === 'prof' || $user->role === 'admin';
        });


        Gate::define('sur_or_dir', function ($user) {
            return $user->role === 'sur' || $user->role === 'dir' || $user->role === 'admin';
        });

        Gate::define('sur_or_comps', function ($user) {
            return $user->role === 'sur' || $user->role === 'comps' || $user->role === 'admin';
        });

        Gate::define('dir_or_comps', function ($user) {
            return $user->role === 'dir' || $user->role === 'comps' || $user->role === 'admin';
        });

        Gate::define('sur_or_dir_or_comps', function ($user) {
            return $user->role === 'sur' || $user->role === 'dir' || $user->role === 'comps' || $user->role === 'admin';
        });












        /*
        Gate::define('access-dashboard', function (User $user) {
            return $user->isAdmin();
        });

        Gate::define('access-admin', function (User $user) {
            return $user->isAdmin();
        });
        */
    }


    
}

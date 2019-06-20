<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdministrator', function ($user) {
            return $user->role === 'admin';
        });

        Gate::define('isNational', function ($user) {
            if ($user->role === 'national' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isQLD', function ($user) {
            if ($user->role === 'qld_manager' || $user->role === 'qld_standard' || $user->role === 'national' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isQLDManager', function ($user) {
            if ($user->role === 'qld_manager' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isQLDStandard', function ($user) {
            if ($user->role === 'qld_standard' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isNSW', function ($user) {
            if ($user->role === 'nsw_manager' || $user->role === 'nsw_standard' || $user->role === 'national' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isNSWManager', function ($user) {
            if ($user->role === 'nsw_manager' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isNSWStandard', function ($user) {
            if ($user->role === 'nsw_standard' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isVIC', function ($user) {
            if ($user->role === 'vic_manager' || $user->role === 'vic_standard' || $user->role === 'national' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isVICManager', function ($user) {
            if ($user->role === 'vic_manager' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isVICStandard', function ($user) {
            if ($user->role === 'vic_standard' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isSA', function ($user) {
            if ($user->role === 'sa_manager' || $user->role === 'sa_standard' || $user->role === 'national' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isSAManager', function ($user) {
            if ($user->role === 'sa_manager' || $user->role === 'admin') {
                return true;
            };
        });

        Gate::define('isSAStandard', function ($user) {
            if ($user->role === 'sa_standard' || $user->role === 'admin') {
                return true;
            };
        });

        Passport::routes();

        //
    }
}
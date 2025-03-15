<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //Authorization

        //Admin Only
        Gate::define('onlyAdmin', function (User $user) {
            return $user->role === 'admin';
        });
        //Full Access to any features (Admin and Lead Engineer)
        Gate::define('full_access', function (User $user) {
            return $user->role === 'lead_engineer';
        });
        //Full Access but cannot delete User (only applies to Sales)
        Gate::define('noDelete', function (User $user) {
            return $user->role === 'sales';
        });
    }
}

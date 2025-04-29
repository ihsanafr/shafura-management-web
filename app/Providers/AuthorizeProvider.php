<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthorizeProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //Admin Only
        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });
        //Full Access to any features except users (Lead Engineer)
        Gate::define('lead', function (User $user) {
            return $user->role === 'lead_engineer';
        });
        //Full Access but cannot delete User (Sales)
        Gate::define('sales', function (User $user) {
            return $user->role === 'sales';
        });
        //can't CRUD only view (Staff Engnineer)
        Gate::define('staff', function (User $user) {
            return $user->role === 'staff_engineer';
        });
    }
}

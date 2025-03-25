<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register debugbar
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //paginator use Bootstrap 4
        Paginator::useBootstrapFour();

        //Authorization

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

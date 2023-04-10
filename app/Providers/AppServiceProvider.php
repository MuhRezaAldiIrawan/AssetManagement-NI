<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::useBootstrap();

        Gate::define('superadmin', function (User $user) {
            return $user->role === 'superadmin';
        });

        Gate::define('accept', function (User $user) {
            return $user->role === 'atasan it' || $user->role === 'it';
        });
    }
}

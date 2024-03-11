<?php

namespace App\Providers;

use App\Models\Item;
use App\Models\User;

use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Pagination\Paginator;
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
        Paginator::defaultView('pagination::default');

        //Gate::define('destroy-item', function (User $user, Item $item) {return $user->is_admin OR $item->price < 1000;});
        $gate = app(Gate::class);
        $gate->define('destroy-item', function (User $user, Item $item) { return $user->is_admin OR $item->price < 1000;});
    }
}

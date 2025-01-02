<?php

namespace App\Providers;

use App\Models\Rent_detail;
use App\Observers\RentDetailObserver;
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
        //
        Rent_detail::observe(RentDetailObserver::class);
    }
}

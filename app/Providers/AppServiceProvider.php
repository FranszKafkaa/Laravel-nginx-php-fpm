<?php

namespace App\Providers;

use App\Services\ProductService;
use App\Services\SaleService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('product', ProductService::class);
        $this->app->bind('sale', SaleService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

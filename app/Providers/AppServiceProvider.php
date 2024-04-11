<?php

namespace App\Providers;

use App\Interfaces\UniqueIdGeneratorInterface;
use App\Services\UniqueIdGeneratorAdapter;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UniqueIdGeneratorInterface::class,
            UniqueIdGeneratorAdapter::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}

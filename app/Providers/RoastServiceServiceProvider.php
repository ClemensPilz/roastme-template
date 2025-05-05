<?php

namespace App\Providers;

use App\Services\RoastService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class RoastServiceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind('roastservice', function () {
            return new RoastService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}

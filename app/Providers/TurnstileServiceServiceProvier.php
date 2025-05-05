<?php

namespace App\Providers;

use App\Services\TurnstileService;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class TurnstileServiceServiceProvier extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        App::bind('turnstileservice', function () {
            return new TurnstileService;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void {}
}

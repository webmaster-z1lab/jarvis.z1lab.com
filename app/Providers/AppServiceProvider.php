<?php

namespace App\Providers;

use App\Models\Check;
use App\Observers\CheckObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Check::observe(CheckObserver::class);
    }
}

<?php

namespace App\Providers;

use App\Contracts\OccupationListSync;
use App\Contracts\OccupationParser;
use App\Services\OnetOccupationListSync;
use App\Services\OnetOccupationParser;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerServices();

        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }

    private function registerServices()
    {
        $this->app->singleton(OccupationParser::class, OnetOccupationParser::class);
        $this->app->singleton(OccupationListSync::class, OnetOccupationListSync::class);
    }
}

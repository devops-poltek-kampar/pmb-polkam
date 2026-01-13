<?php

namespace App\Providers;

use App\Http\Middleware\PMBMiddleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class PMBRouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Route::middleware(['web', PMBMiddleware::class])
            ->prefix('pmb')
            ->name('pmb.')
            ->group(base_path('routes/pmb.php'));
    }
}

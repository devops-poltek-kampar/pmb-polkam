<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MabaRouteServiceProvider extends ServiceProvider
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

        Route::middleware(['web', "role:user"])
            // ->name('user.')
            ->prefix('user')
            ->group(base_path('routes/user.php'));

        // Route::middleware(['web', MabaMiddleware::class])
        //     // ->name('user.')
        //     ->prefix('user')
        //     ->group(base_path('routes/user.php'));
    }
}

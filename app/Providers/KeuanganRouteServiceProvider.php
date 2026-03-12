<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class KeuanganRouteServiceProvider extends ServiceProvider
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

        Route::middleware(['web', "role:keuangan"])
            ->prefix('keuangan')
            // ->name('pmb.')
            ->group(base_path('routes/keuangan.php'));
        // Route::middleware(['web', KeuanganMiddleware::class])
        //     ->prefix('keuangan')
        //     // ->name('pmb.')
        //     ->group(base_path('routes/keuangan.php'));
    }
}

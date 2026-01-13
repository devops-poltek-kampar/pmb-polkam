<?php

namespace App\Providers;

use App\Http\Middleware\MabaMiddleware;
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
        Route::middleware(['web', MabaMiddleware::class])
            // ->name('user.')
            ->prefix('user')
            ->group(base_path('routes/user.php'));
    }
}

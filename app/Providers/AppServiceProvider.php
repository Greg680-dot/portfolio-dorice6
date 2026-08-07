<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Evite l'erreur MySQL "1071 - La clé est trop longue" sur les
        // anciennes versions de MySQL/MariaDB (utf8mb4 + index > 767 octets).
        Schema::defaultStringLength(191);
    }
}

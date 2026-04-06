<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Artikel;
use App\Policies\MenuPolicy;
use App\Policies\ArtikelPolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
        //
    }

    protected $policies = [
        Menu::class => MenuPolicy::class,
        Artikel::class => ArtikelPolicy::class,
    ];
}

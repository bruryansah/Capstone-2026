<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Navigation\NavigationItem;
use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */



    public function boot(): void
    {
        Filament::serving(function () {
            Filament::registerNavigationItems([
                NavigationItem::make('Home') // Nama menu
                    ->url(route('home')) // Route yang dituju
                    ->icon('heroicon-o-link')
                    ->group('Halaman Utama') // Ikon untuk me
            ]);
        });
    }
}

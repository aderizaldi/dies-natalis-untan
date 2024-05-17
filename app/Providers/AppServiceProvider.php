<?php

namespace App\Providers;

use App\Models\PartnerLogo;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('landing.includes.footer', function ($view) {
            $partners = PartnerLogo::all();
            $view->with('partner_logos', $partners);
        });
    }
}

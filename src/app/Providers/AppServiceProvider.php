<?php

namespace App\Providers;

use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Input\Button;
use App\View\Components\Form\Button as FormButton;
use Illuminate\Pagination\Paginator;

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
        Blade::component('package-alert', Alert::class);

        Blade::component('button', Button::class);

        Blade::component('form-button', FormButton::class);

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
    }

}

<?php

namespace App\Modules\Anaf\Providers;

use App\Modules\Anaf\Actions\Applications\CreateApplication;
use App\Modules\Anaf\Actions\Contracts\CreateApplications;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CreateApplications::class, CreateApplication::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

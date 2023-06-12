<?php

namespace App\Providers;

use App\Repository\Office\officeInterface;
use App\Repository\Office\officeRepository;
use App\Repository\Role\roleInterface;
use App\Repository\Role\roleRepository;
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
        $this->app->bind(roleInterface::class,roleRepository::class);
        $this->app->bind(officeInterface::class,officeRepository::class);
        $this->app->bind(gl_accountInterface::class,gl_accountRepository::class);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

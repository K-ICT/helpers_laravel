<?php

namespace Kict\HelpersLaravel;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        # Load helpers.
        foreach(glob(__DIR__ .'/App/Helpers/*.php') as $helpersFilename) {
            require_once($helpersFilename);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

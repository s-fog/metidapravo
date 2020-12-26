<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class FunctionsServicerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadHelpers();
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

    protected function loadHelpers()
    {
        foreach (glob(app_path().'/Functions/*.php') as $filename)
        {
            require_once $filename;
        }
    }
}

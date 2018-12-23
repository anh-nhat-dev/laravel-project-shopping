<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerComposer();
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function registerComposer()
    {
        app('view')->composer([
            'backend.categories.index',
            'backend.categories.edit'
        ], \App\Composers\CatesComposers::class);
    }
}

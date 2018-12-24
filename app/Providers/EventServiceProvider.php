<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerEvent();
    }

    public function registerEvent()
    {
        $this->app['events']->listen(
            \App\Events\Products\ProductCreate::class,
            \App\Listeners\Products\CreateAttributeProduct::class
        );

        $this->app['events']->listen(
            \App\Events\Products\ProductUpdate::class,
            \App\Listeners\Products\UpdateAttributeProduct::class
        );
    }
}

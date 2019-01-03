<?php

namespace App\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use App\Blade\Facades\MenuDirective;

class ExtendBladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['blade.compiler']->directive('menuFont', function ($data) {
            return "<?php echo MenuDirective::show($data); ?>";
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    
    public function register()
    {
        $this->app->bind('menu.diretive', function () {
            return new \App\Blade\MenuDirective();
        });

        $this->app->booting(function(){
            AliasLoader::getInstance()->alias('MenuDirective', MenuDirective::class);
        });
    }
}

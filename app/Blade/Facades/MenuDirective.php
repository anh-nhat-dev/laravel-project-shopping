<?php

namespace App\Blade\Facades;

use Illuminate\Support\Facades\Facade;

final class MenuDirective extends Facade 
{
    protected static function getFacadeAccessor()
    {
        return 'menu.diretive';
    }
}
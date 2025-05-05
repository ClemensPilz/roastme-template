<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class TurnstileService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'turnstileservice';
    }
}

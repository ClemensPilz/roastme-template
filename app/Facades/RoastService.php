<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class RoastService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'roastservice';
    }
}

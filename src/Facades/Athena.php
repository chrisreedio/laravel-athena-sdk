<?php

namespace ChrisReedIO\Athena\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\Athena\Athena
 */
class Athena extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ChrisReedIO\Athena\Athena::class;
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\AthenaSDK\Athena
 */
class Athena extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \ChrisReedIO\AthenaSDK\Athena::class;
    }
}

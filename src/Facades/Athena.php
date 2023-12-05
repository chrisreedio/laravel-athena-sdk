<?php

namespace ChrisReedIO\AthenaSDK\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\AthenaSDK\AthenaConnector
 */
class Athena extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \ChrisReedIO\AthenaSDK\AthenaConnector::class;
    }
}

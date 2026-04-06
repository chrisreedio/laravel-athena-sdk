<?php

namespace ChrisReedIO\AthenaSDK\Facades;

use ChrisReedIO\AthenaSDK\AthenaConnector;
use Illuminate\Support\Facades\Facade;

/**
 * @see \ChrisReedIO\AthenaSDK\AthenaConnector
 */
class Athena extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return AthenaConnector::class;
    }
}

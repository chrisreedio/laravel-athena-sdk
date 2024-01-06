<?php

namespace ChrisReedIO\AthenaSDK;

// use Saloon\Http\Connector;

abstract class Resource
{
    public function __construct(
        // protected Connector $connector,
        protected AthenaConnector $connector,
    ) {
    }
}

<?php

namespace ChrisReedIO\AthenaSDK;

abstract class Resource
{
    public function __construct(
        protected AthenaConnector $connector,
    ) {}
}

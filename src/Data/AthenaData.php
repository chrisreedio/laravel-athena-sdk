<?php

namespace ChrisReedIO\AthenaSDK\Data;

abstract readonly class AthenaData
{
    abstract public function __construct();

    abstract public static function fromArray(array $data): static;
}

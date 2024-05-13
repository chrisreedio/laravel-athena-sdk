<?php

namespace ChrisReedIO\AthenaSDK\Data;

abstract readonly class AthenaData
{
    abstract public function __construct();

    abstract public static function fromArray(array $data): static;

    protected static function toBool($value): ?bool
    {
        if ($value === null) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }
}

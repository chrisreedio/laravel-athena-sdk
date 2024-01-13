<?php

namespace ChrisReedIO\AthenaSDK\Data\Practice;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class EthnicityData extends AthenaData
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            id: $data['ethnicityid'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}

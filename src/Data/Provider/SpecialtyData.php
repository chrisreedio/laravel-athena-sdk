<?php

namespace ChrisReedIO\AthenaSDK\Data\Provider;

readonly class SpecialtyData
{
    public function __construct(
        public string $athenaId,
        public string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['specialtyid'],
            name: $data['specialtyname'],
        );
    }
}

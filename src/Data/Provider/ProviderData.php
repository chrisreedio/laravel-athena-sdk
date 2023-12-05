<?php

namespace ChrisReedIO\AthenaSDK\Data\Provider;

readonly class ProviderData
{
    public function __construct(
        public int $athenaId,
        public int $npi,
        public string $firstName,
        public string $lastName,
        public string $specialtyId,
        public string $specialty,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['providerid'],
            npi: $data['npi'],
            firstName: $data['firstname'],
            lastName: $data['lastname'],
            specialtyId: $data['specialtyid'],
            specialty: $data['specialty'],
        );
    }
}

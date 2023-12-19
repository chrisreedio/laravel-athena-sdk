<?php

namespace ChrisReedIO\AthenaSDK\Data;

readonly class AddressData extends AthenaData
{
    public function __construct(
        public ?string $street = null,
        public ?string $suite = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zip = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            street: $data['address'] ?? null,
            suite: $data['address2'] ?? null,
            city: $data['city'] ?? null,
            state: $data['state'] ?? null,
            zip: $data['zip'] ?? null,
        );
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Data;

readonly class SubscriptionEventData
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        // dd($data);
        return new self(
            // id: $data['id'],
            name: $data['eventname'],
        );
    }
}

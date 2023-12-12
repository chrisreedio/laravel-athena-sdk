<?php

namespace ChrisReedIO\AthenaSDK\Data\Appointment;

readonly class ConfirmationStatusData
{
    public function __construct(
        public ?int $athenaId = null,
        public ?string $name = null,
    ) {

    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['statusid'] ?? null,
            name: $data['name'] ?? null,
        );
    }
}

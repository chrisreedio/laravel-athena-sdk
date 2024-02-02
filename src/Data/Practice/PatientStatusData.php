<?php

namespace ChrisReedIO\AthenaSDK\Data\Practice;

readonly class PatientStatusData
{
    public function __construct(
        public ?int $athenaId = null,
        public ?string $name = null,
    ) {

    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['patientstatusid'] ?? null,
            name: $data['patientstatusname'] ?? null,
        );
    }
}

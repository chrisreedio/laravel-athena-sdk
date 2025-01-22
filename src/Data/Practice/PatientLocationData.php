<?php

namespace ChrisReedIO\AthenaSDK\Data\Practice;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class PatientLocationData extends AthenaData
{
    public function __construct(
        public ?int $athenaId = null,
        public ?string $name = null,
        public ?bool $isDefault = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            athenaId: $data['patientlocationid'] ?? null,
            name: $data['name'] ?? null,
            isDefault: self::toBool($data['defaultoncheckin'] ?? null),
        );
    }
}

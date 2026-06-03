<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class PatientSignatureData extends AthenaData
{
    public function __construct(
        public ?string $effectiveDate = null,
        public ?string $expirationDate = null,
        public ?bool $isOnFile = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            effectiveDate: $data['patientsignatureeffectivedate'] ?? null,
            expirationDate: $data['patientsignatureexpirationdate'] ?? null,
            isOnFile: self::toBool($data['ispatientsignatureonfile'] ?? null),
        );
    }
}

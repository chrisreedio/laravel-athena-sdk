<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class InsuredSignatureData extends AthenaData
{
    public function __construct(
        public ?string $effectiveDate = null,
        public ?string $expirationDate = null,
        public ?bool $isOnFile = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            effectiveDate: $data['insuredsignatureeffectivedate'] ?? null,
            expirationDate: $data['insuredsignatureexpirationdate'] ?? null,
            isOnFile: self::toBool($data['isinsuredsignatureonfile'] ?? null),
        );
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class InsuranceCopayData extends AthenaData
{
    public function __construct(
        public ?string $type = null,
        public ?string $amount = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            type: $data['copaytype'] ?? null,
            amount: $data['copayamount'] ?? null,
        );
    }
}

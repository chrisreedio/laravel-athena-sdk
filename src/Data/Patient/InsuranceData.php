<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class InsuranceData extends AthenaData
{
    public function __construct(
        public ?string $athenaId = null,
        public ?int $ircId = null,
        public ?string $ircName = null,
        public ?string $type = null,
        public ?string $planName = null,
        public ?int $relationshipToInsuredId = null,
        public ?string $relationshipToInsured = null,
        public ?string $eligibilityStatus = null,
        public ?int $packageId = null,
        public ?int $sequenceNumber = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            athenaId: $data['insuranceid'],
            ircId: $data['ircid'] ?? null,
            ircName: $data['ircname'] ?? null,
            type: $data['insurancetype'],
            planName: $data['insuranceplanname'],
            relationshipToInsuredId: $data['relationshiptoinsuredid'] ?? null,
            relationshipToInsured: $data['relationshiptoinsured'] ?? null,
            eligibilityStatus: $data['eligibilitystatus'] ?? null,
            packageId: $data['packageid'] ?? null,
            sequenceNumber: $data['sequencenumber'] ?? null,
        );
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Data\Provider;

readonly class ProviderData
{
    public function __construct(
        public int $athenaId,
        public ?int $npi,
        public ?string $entityType,
        public ?string $firstName,
        public ?string $lastName,
        public ?string $schedulingName,
        public ?string $specialtyId,
        public ?string $specialty,
        public ?bool $hideInPortal,
        public ?bool $billable,
        public ?bool $createsEncounters,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['providerid'],
            npi: $data['npi'] ?? null,
            entityType: $data['entitytype'] ?? null,
            firstName: $data['firstname'] ?? null,
            lastName: $data['lastname'] ?? null,
            schedulingName: $data['schedulingname'] ?? null,
            specialtyId: $data['specialtyid'] ?? null,
            specialty: $data['specialty'] ?? null,
            hideInPortal: $data['hideinportal'] ?? false,
            billable: $data['billable'] ?? false,
            createsEncounters: $data['createencounteroncheckin'] ?? false,
        );
    }
}

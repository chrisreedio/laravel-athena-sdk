<?php

namespace ChrisReedIO\AthenaSDK\Data\Provider;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class ProviderData extends AthenaData
{
    public function __construct(
        public ?int $athenaId = null,
        public ?int $npi = null,
        public ?string $entityType = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $schedulingName = null,
        public ?string $specialtyId = null,
        public ?string $specialty = null,
        public ?bool $hideInPortal = null,
        public ?bool $billable = null,
        public ?bool $createsEncounters = null,
        public ?string $typeName = null,
        public ?string $typeId = null,
        public ?string $ansiSpecialtyCode = null,
        public ?string $ansiSpecialtyName = null,
    ) {}

    public static function fromArray(array $data): static
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
            hideInPortal: self::toBool($data['hideinportal'] ?? false),
            billable: self::toBool($data['billable'] ?? false),
            createsEncounters: self::toBool($data['createencounteroncheckin'] ?? false),
            typeName: $data['providertype'] ?? null,
            typeId: $data['providertypeid'] ?? null,
            ansiSpecialtyCode: $data['ansispecialtycode'] ?? null,
            ansiSpecialtyName: $data['ansispecialtyname'] ?? null,
        );
    }
}

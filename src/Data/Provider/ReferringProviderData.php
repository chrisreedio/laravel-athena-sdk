<?php

namespace ChrisReedIO\AthenaSDK\Data\Provider;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class ReferringProviderData extends AthenaData
{
    public function __construct(
        public ?string $athenaId = null,
        public ?string $address = null,
        public ?string $address2 = null,
        public ?string $ansiNameCode = null,
        public ?string $ansiSpecialtyCode = null,
        public ?string $city = null,
        public ?string $email = null,
        public ?string $entityType = null,
        public ?string $fax = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $middleInitial = null,
        public ?string $name = null,
        public ?string $nameSuffix = null,
        public ?string $note = null,
        public ?int $npiNumber = null,
        public ?string $phone = null,
        public ?string $type = null,
        public ?string $specialty = null,
        public ?string $state = null,
        public ?string $zip = null,
    ) {}

    public static function fromArray(array $data): static
    {
        return new static(
            athenaId: $data['referringproviderid'] ?? null,
            address: $data['address'] ?? null,
            address2: $data['address2'] ?? null,
            ansiNameCode: $data['ansinamecode'] ?? null,
            ansiSpecialtyCode: $data['ansispecialtycode'] ?? null,
            city: $data['city'] ?? null,
            email: $data['email'] ?? null,
            entityType: $data['entitytype'] ?? null,
            fax: $data['fax'] ?? null,
            firstName: $data['firstname'] ?? null,
            lastName: $data['lastname'] ?? null,
            middleInitial: $data['middleinitial'] ?? null,
            name: $data['name'] ?? null,
            nameSuffix: $data['namesuffix'] ?? null,
            note: $data['note'] ?? null,
            npiNumber: $data['npinumber'] ?? null,
            phone: $data['phone'] ?? null,
            type: $data['providertype'] ?? null,
            specialty: $data['specialty'] ?? null,
            state: $data['state'] ?? null,
            zip: $data['zip'] ?? null,
        );
    }
}

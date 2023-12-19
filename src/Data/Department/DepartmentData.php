<?php

namespace ChrisReedIO\AthenaSDK\Data\Department;

use ChrisReedIO\AthenaSDK\Data\AddressData;
use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class DepartmentData extends AthenaData
{
    public function __construct(
        public ?string $athenaId = null,
        public ?string $name = null,
        public ?string $patientName = null,
        public ?string $phone = null,
        public ?int $timezone = null,
        public ?AddressData $address = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            athenaId: $data['departmentid'],
            name: $data['name'],
            patientName: $data['patientdepartmentname'] ?? null,
            phone: $data['phone'] ?? null,
            timezone: $data['timezone'] ?? null,
            address: (isset($data['address']) ? AddressData::fromArray($data) : null),

        );
    }
}

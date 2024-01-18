<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class EmergencyContactData extends AthenaData
{
    /**
     * @param  string|null  $relationship  SPOUSE, PARENT, CHILD, SIBLING, FRIEND, COUSIN, GUARDIAN, OTHER
     */
    public function __construct(
        public ?string $name = null,
        public ?string $relationship = null,
        public ?string $homePhone = null,
        public ?string $mobilePhone = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            name: $data['contactname'] ?? null,
            relationship: $data['contactrelationship'] ?? null,
            homePhone: $data['contacthomephone'] ?? null,
            mobilePhone: $data['contactmobilephone'] ?? null,
        );
    }
}

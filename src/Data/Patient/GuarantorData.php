<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AthenaData;

readonly class GuarantorData extends AthenaData
{
    public function __construct(
        public ?string $first_name = null,
        public ?string $last_name = null,
        public ?string $birthday = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zip = null,
        public ?string $countryCode3166 = null,
        public ?string $countryCode = null,
        // public ?string $homePhone = null,
        // public ?string $mobilePhone = null,
        public ?string $phone = null,
        public ?string $email = null,
        public ?string $relationshipToPatient = null,
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            first_name: $data['guarantorfirstname'] ?? null,
            last_name: $data['guarantorlastname'] ?? null,
            birthday: $data['guarantordob'] ?? null,
            address1: $data['guarantoraddress1'] ?? null,
            address2: $data['guarantoraddress2'] ?? null,
            city: $data['guarantorcity'] ?? null,
            state: $data['guarantorstate'] ?? null,
            zip: $data['guarantorzip'] ?? null,
            countryCode3166: $data['guarantorcountrycode3166'] ?? null,
            countryCode: $data['guarantorcountrycode'] ?? null,
            // homePhone: $data['guarantorhomephone'] ?? null,
            // mobilePhone: $data['guarantormobilephone'] ?? null,
            phone: $data['guarantorphone'] ?? null,
            email: $data['guarantoremail'] ?? null,
            relationshipToPatient: $data['guarantorrelationshiptopatient'] ?? null,
        );
    }
}

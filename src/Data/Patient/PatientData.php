<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use ChrisReedIO\AthenaSDK\Data\AddressData;
use ChrisReedIO\AthenaSDK\Data\AthenaData;
use DateTime;

readonly class PatientData extends AthenaData
{
    /**
     * @param  string|null  $sex  - M/F
     */
    public function __construct(
        public ?int $athenaId = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?string $sex = null,
        public ?DateTime $dob = null,
        public ?string $email = null,
        public ?bool $emailExists = null,
        public ?string $homePhone = null,
        public ?string $mobilePhone = null,

        public ?string $departmentId = null,

        public ?AddressData $address = null,

        // Contact Preferences
        public ?bool $contactPreferenceAnnouncementSms = null,
        //TODO - Grab the other contact preferences from the patient data
        public ?bool $portalTermsOnFile = null,
        public ?bool $consentToText = null,
        public ?bool $consentToCall = null,
        public ?DateTime $smsOptInDate = null,
        public ?bool $contactPreferenceLabPhone = null,
        public ?string $contactPreference = null,

        public ?bool $patientPhoto = null,
        public ?string $confidentialityCode = null,

        public ?GuarantorData $guarantor = null,
        public ?EmergencyContactData $emergencyContact = null,

        public ?array $race = null,
        public ?string $raceCode = null,
        public ?array $ethnicities = null,
        public ?string $ethnicityCode = null,
        public ?string $languageCode = null,

        public ?string $primaryDepartmentId = null,
        public ?string $primaryProviderId = null,

        public ?bool $privacyInformationVerified = null,

        public array $customFields = [],
    ) {
    }

    public static function fromArray(array $data): static
    {
        return new static(
            athenaId: $data['patientid'] ?? null,
            firstName: $data['firstname'] ?? null,
            lastName: $data['lastname'] ?? null,
            sex: $data['sex'] ?? null,
            dob: isset($data['dob']) ? new DateTime($data['dob']) : null,
            email: $data['email'] ?? null,
            emailExists: $data['emailexists'] ?? null,
            homePhone: $data['homephone'] ?? null,
            mobilePhone: $data['mobilephone'] ?? null,
            departmentId: $data['departmentid'] ?? null,
            address: AddressData::fromArray($data),
            contactPreferenceAnnouncementSms: $data['contactpreference_announcement_sms'] ?? null,
            portalTermsOnFile: $data['portaltermsonfile'] ?? null,
            consentToText: $data['consenttotext'] ?? null,
            consentToCall: $data['consenttocall'] ?? null,
            smsOptInDate: isset($data['smsoptindate']) ? new DateTime($data['smsoptindate']) : null,
            contactPreferenceLabPhone: $data['contactpreference_lab_phone'] ?? null,
            contactPreference: $data['contactpreference'] ?? null,
            patientPhoto: $data['patientphoto'] ?? null,
            confidentialityCode: $data['confidentialityCode'] ?? null,
            guarantor: GuarantorData::fromArray($data),
            emergencyContact: EmergencyContactData::fromArray($data),
            race: $data['race'] ?? null,
            raceCode: $data['racecode'] ?? null,
            ethnicities: $data['ethnicitycodes'] ?? null,
            ethnicityCode: $data['ethnicitycode'] ?? null,
            languageCode: $data['language6392code'] ?? null,
            primaryDepartmentId: $data['primarydepartmentid'] ?? null,
            primaryProviderId: $data['primaryproviderid'] ?? null,
            privacyInformationVerified: $data['privacyinformationverified'] ?? null,
            customFields: $data['customfields'] ?? [],
        );
    }
}

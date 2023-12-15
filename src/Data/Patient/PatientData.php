<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use DateTime;

readonly class PatientData
{
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

        // Address
        public ?string $street = null,
        public ?string $suite = null,
        public ?string $city = null,
        public ?string $state = null,
        public ?string $zip = null,
        public ?string $countryCode = null,
        public ?string $countryCode3166 = null,

        // Contact Preferences
        public ?bool $contactPreferenceAnnouncementSms = null,
        public ?bool $portalTermsOnFile = null,
        public ?bool $consentToText = null,
        public ?bool $consentToCall = null,
        public ?DateTime $smsOptInDate = null,
        public ?bool $contactPreferenceLabPhone = null,

        public ?bool $patientPhoto = null,
        public ?string $confidentialityCode = null,

        public ?GuarantorData $guarantor = null,
        public ?EmergencyContactData $emergencyContact = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        // dd($data);

        return new self(
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
            street: $data['street'] ?? null,
            suite: $data['suite'] ?? null,
            city: $data['city'] ?? null,
            state: $data['state'] ?? null,
            zip: $data['zip'] ?? null,
            countryCode: $data['countrycode'] ?? null,
            countryCode3166: $data['countrycode3166'] ?? null,
            contactPreferenceAnnouncementSms: $data['contactpreference_announcement_sms'] ?? null,
            portalTermsOnFile: $data['portaltermsonfile'] ?? null,
            consentToText: $data['consenttotext'] ?? null,
            consentToCall: $data['consenttocall'] ?? null,
            smsOptInDate: isset($data['smsoptindate']) ? new DateTime($data['smsoptindate']) : null,
            contactPreferenceLabPhone: $data['contactpreference_lab_phone'] ?? null,
            patientPhoto: $data['patientphoto'] ?? null,
            confidentialityCode: $data['confidentialityCode'] ?? null,
            guarantor: GuarantorData::fromArray($data),
            emergencyContact: EmergencyContactData::fromArray($data),
        );
    }
}

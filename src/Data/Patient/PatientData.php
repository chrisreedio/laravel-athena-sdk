<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use DateTime;

readonly class PatientData
{
    public function __construct(
        public ?int $athenaId = null,
        public ?string $firstName = null,
        public ?string $lastName = null,
        public ?DateTime $dob = null,
        public ?string $email = null,
        public ?string $homePhone = null,
        public ?string $mobilePhone = null,
        public ?string $guarantorCountryCode3166 = null,
        public ?string $city = null,
        public ?string $departmentId = null,
        public ?bool $portalTermsOnFile = null,
        public ?bool $consentToText = null,
        public ?bool $patientPhoto = null,
        public ?string $guarantorZip = null,
        public ?string $guarantorFirstName = null,
        public ?bool $consentToCall = null,
        public ?string $guarantorCity = null,
        public ?string $guarantorLastName = null,
        public ?string $zip = null,
        public ?bool $contactPreferenceAnnouncementSms = null,
        public ?DateTime $guarantorDob = null,
        public ?string $guarantorRelationshipToPatient = null,
        public ?string $confidentialityCode = null,
        public ?string $guarantorAddress1 = null,
        public ?bool $emailExists = null,
        public ?string $sex = null,
        public ?DateTime $smsOptInDate = null,
        public ?string $guarantorState = null,
        public ?bool $contactPreferenceLabPhone = null,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['patientid'] ?? null,
            firstName: $data['firstname'] ?? null,
            lastName: $data['lastname'] ?? null,
            dob: isset($data['dob']) ? new DateTime($data['dob']) : null,
            email: $data['email'] ?? null,
            homePhone: $data['homephone'] ?? null,
            mobilePhone: $data['mobilephone'] ?? null,
            guarantorCountryCode3166: $data['guarantorcountrycode3166'] ?? null,
            city: $data['city'] ?? null,
            departmentId: $data['departmentid'] ?? null,
            portalTermsOnFile: $data['portaltermsonfile'] ?? null,
            consentToText: $data['consenttotext'] ?? null,
            patientPhoto: $data['patientphoto'] ?? null,
            guarantorZip: $data['guarantorzip'] ?? null,
            guarantorFirstName: $data['guarantorfirstname'] ?? null,
            consentToCall: $data['consenttocall'] ?? null,
            guarantorCity: $data['guarantorcity'] ?? null,
            guarantorLastName: $data['guarantorlastname'] ?? null,
            zip: $data['zip'] ?? null,
            contactPreferenceAnnouncementSms: $data['contactpreference_announcement_sms'] ?? null,
            guarantorDob: isset($data['guarantordob']) ? new DateTime($data['guarantordob']) : null,
            guarantorRelationshipToPatient: $data['guarantorrelationshiptopatient'] ?? null,
            confidentialityCode: $data['confidentialityCode'] ?? null,
            guarantorAddress1: $data['guarantoraddress1'] ?? null,
            emailExists: $data['emailexists'] ?? null,
            sex: $data['sex'] ?? null,
            smsOptInDate: isset($data['smsoptindate']) ? new DateTime($data['smsoptindate']) : null,
            guarantorState: $data['guarantorstate'] ?? null,
            contactPreferenceLabPhone: $data['contactpreference_lab_phone'] ?? null,
        );
    }
}

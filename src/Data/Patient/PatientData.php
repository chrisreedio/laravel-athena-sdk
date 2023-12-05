<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use DateTime;

readonly class PatientData
{
    public function __construct(
        public string $email,
        public string $guarantorCountryCode3166,
        public string $city,
        public string $departmentId,
        public bool $portalTermsOnFile,
        public bool $consentToText,
        public DateTime $dob,
        public bool $patientPhoto,
        public string $guarantorZip,
        public string $guarantorFirstName,
        public bool $consentToCall,
        public string $lastName,
        public string $guarantorCity,
        public string $guarantorLastName,
        public string $zip,
        public bool $contactPreferenceAnnouncementSms,
        public DateTime $guarantorDob,
        public string $guarantorRelationshipToPatient,
        public string $firstName,
        public string $confidentialityCode,
        public string $guarantorAddress1,
        public bool $emailExists,
        public string $sex,
        public string $homePhone,
        public DateTime $smsOptInDate,
        public string $guarantorState,
        public bool $contactPreferenceLabPhone,
        // ... Add other properties in similar fashion
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            email: $data['email'],
            guarantorCountryCode3166: $data['guarantorcountrycode3166'],
            city: $data['city'],
            departmentId: $data['departmentid'],
            portalTermsOnFile: $data['portaltermsonfile'],
            consentToText: $data['consenttotext'],
            dob: new DateTime($data['dob']),
            patientPhoto: $data['patientphoto'],
            guarantorZip: $data['guarantorzip'],
            guarantorFirstName: $data['guarantorfirstname'],
            consentToCall: $data['consenttocall'],
            lastName: $data['lastname'],
            guarantorCity: $data['guarantorcity'],
            guarantorLastName: $data['guarantorlastname'],
            zip: $data['zip'],
            contactPreferenceAnnouncementSms: $data['contactpreference_announcement_sms'],
            guarantorDob: new DateTime($data['guarantordob']),
            guarantorRelationshipToPatient: $data['guarantorrelationshiptopatient'],
            firstName: $data['firstname'],
            confidentialityCode: $data['confidentialitycode'],
            guarantorAddress1: $data['guarantoraddress1'],
            emailExists: $data['emailexists'],
            sex: $data['sex'],
            homePhone: $data['homephone'],
            smsOptInDate: new DateTime($data['smsoptindate']),
            guarantorState: $data['guarantorstate'],
            contactPreferenceLabPhone: $data['contactpreference_lab_phone'],
        // ... Initialize other properties in similar fashion
        );
    }
}

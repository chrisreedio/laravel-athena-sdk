<?php

namespace ChrisReedIO\AthenaSDK\Data\Patient;

use DateTime;

readonly class PatientData
{
    public function __construct(
        public int $athenaId,
        public string $firstName,
        public string $lastName,
        public DateTime $dob,
        public string $email,
        public string $homePhone,
        public string $mobilePhone,
        public string $guarantorCountryCode3166,
        public string $city,
        public string $departmentId,
        public bool $portalTermsOnFile,
        public bool $consentToText,
        public bool $patientPhoto,
        public string $guarantorZip,
        public string $guarantorFirstName,
        public bool $consentToCall,
        public string $guarantorCity,
        public string $guarantorLastName,
        public string $zip,
        public bool $contactPreferenceAnnouncementSms,
        public DateTime $guarantorDob,
        public string $guarantorRelationshipToPatient,
        public string $confidentialityCode,
        public string $guarantorAddress1,
        public bool $emailExists,
        public string $sex,
        public DateTime $smsOptInDate,
        public string $guarantorState,
        public bool $contactPreferenceLabPhone,
    ) {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            athenaId: $data['patientid'],
            firstName: $data['firstname'],
            lastName: $data['lastname'],
            dob: new DateTime($data['dob']),
            email: $data['email'],
            homePhone: $data['homephone'],
            mobilePhone: $data['mobilephone'],
            guarantorCountryCode3166: $data['guarantorcountrycode3166'],
            city: $data['city'],
            departmentId: $data['departmentid'],
            portalTermsOnFile: $data['portaltermsonfile'],
            consentToText: $data['consenttotext'],
            patientPhoto: $data['patientphoto'],
            guarantorZip: $data['guarantorzip'],
            guarantorFirstName: $data['guarantorfirstname'],
            consentToCall: $data['consenttocall'],
            guarantorCity: $data['guarantorcity'],
            guarantorLastName: $data['guarantorlastname'],
            zip: $data['zip'],
            contactPreferenceAnnouncementSms: $data['contactpreference_announcement_sms'],
            guarantorDob: new DateTime($data['guarantordob']),
            guarantorRelationshipToPatient: $data['guarantorrelationshiptopatient'],
            confidentialityCode: $data['confidentialitycode'],
            guarantorAddress1: $data['guarantoraddress1'],
            emailExists: $data['emailexists'],
            sex: $data['sex'],
            smsOptInDate: new DateTime($data['smsoptindate']),
            guarantorState: $data['guarantorstate'],
            contactPreferenceLabPhone: $data['contactpreference_lab_phone'],
            // ... Initialize other properties in similar fashion
        );
    }
}

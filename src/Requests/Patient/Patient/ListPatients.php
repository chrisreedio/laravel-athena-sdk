<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use ChrisReedIO\AthenaSDK\PaginatedRequest;
use ChrisReedIO\AthenaSDK\Request;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * ListPatients
 *
 * Retrieves a list of patients in the given practice based on search criteria Note: This endpoint may
 * rely on specific settings to be enabled in athenaNet Production to function properly that are not
 * required in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPatients extends Request//PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'patients';

    public function resolveEndpoint(): string
    {
        return '/patients';
    }

    /**
     * @param  null|string  $address1 Patient's address - 1st line (Max length: 100)
     * @param  null|string  $address2 Patient's address - 2nd line (Max length: 100)
     * @param  null|string  $agriculturalworker Used to identify this patient as an agricultural worker. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $agriculturalworkertype For patients that are agricultural workers, identifies the type of worker. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $anyphone Any phone number for the patient.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients.  You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.
     * @param  null|int  $appointmentdepartmentid The ID of the department associated with the upcoming appointment.
     * @param  null|string  $appointmentproviderid The ID of the provider associated with the upcoming appointment.
     * @param  null|string  $caresummarydeliverypreference The patient's preference for care summary delivery.
     * @param  null|string  $city Patient's city (Max length: 30)
     * @param  null|string  $clinicalordertypegroupid The clinical order type group of the clinical provider (Prescription: 10, Lab: 11, Vaccinations: 16).
     * @param  null|array  $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $consenttocall The flag is used to record the consent of a patient to receive automated calls per FCC requirements. The requested legal language is 'Entry of any telephone contact number constitutes written consent to receive any automated, prerecorded, and artificial voice telephone calls initiated by the Practice. To alter or revoke this consent, visit the Patient Portal "Contact Preferences" page.'
     * @param  null|bool  $consenttotext The flag is used to record the consent of a patient to receive text messages per FCC requirements. In order for this to be true, a valid mobile phone number must be set and the practice setting "Hide SMS Opt-in option" must be set to Off.
     * @param  null|string  $contacthomephone Emergency contact home phone.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $contactmobilephone Emergency contact mobile phone.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $contactname The name of the (emergency) person to contact about the patient. The contactname, contactrelationship, contacthomephone, and contactmobilephone fields are all related to the emergency contact for the patient. They are NOT related to the contractpreference_* fields. (Max length: 20)
     * @param  null|string  $contactpreference The MU-required field for "preferred contact method". This is not used by any automated systems.
     * @param  null|bool  $contactpreferenceAnnouncementEmail If set, the patient has indicated a preference to get or not get "announcement" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceAnnouncementPhone If set, the patient has indicated a preference to get or not get "announcement" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceAnnouncementSms If set, the patient has indicated a preference to get or not get "announcement" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|bool  $contactpreferenceAppointmentEmail If set, the patient has indicated a preference to get or not get "appointment" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceAppointmentPhone If set, the patient has indicated a preference to get or not get "appointment" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceAppointmentSms If set, the patient has indicated a preference to get or not get "appointment" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|bool  $contactpreferenceBillingEmail If set, the patient has indicated a preference to get or not get "billing" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceBillingPhone If set, the patient has indicated a preference to get or not get "billing" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceBillingSms If set, the patient has indicated a preference to get or not get "billing" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|bool  $contactpreferenceLabEmail If set, the patient has indicated a preference to get or not get "lab" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceLabPhone If set, the patient has indicated a preference to get or not get "lab" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceLabSms If set, the patient has indicated a preference to get or not get "lab" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|string  $contactrelationship Emergency contact relationship (one of SPOUSE, PARENT, CHILD, SIBLING, FRIEND, COUSIN, GUARDIAN, OTHER)
     * @param  null|string  $countrycode3166 Patient's country code (ISO 3166-1) (Max length: 20)
     * @param  null|string  $deceaseddate If present, the date on which a patient died.
     * @param  null|string  $defaultpharmacyncpdpid The NCPDP ID of the patient's preferred pharmacy.  See http://www.ncpdp.org/ for details. Note: if updating this field, please make sure to have a CLINICALORDERTYPEGROUPID field as well.
     * @param  null|int  $departmentid Primary (registration) department ID. A special value of -1 can be used to search for cases where, due to an unusual import or other reasons, the registration department is not set.
     * @param  null|string  $dob Patient's DOB (mm/dd/yyyy)
     * @param  null|string  $driverslicenseexpirationdate The expiration date of the patient's driver's license.
     * @param  null|string  $driverslicensenumber The number of the patient's driver's license (Max length: 20)
     * @param  null|string  $driverslicensestateid The state of the patient's driver's license. This is in the form of a 2 letter state code. (Max length: 20)
     * @param  null|string  $email Patient's email address.  'declined' can be used to indicate just that.
     * @param  null|int  $employerid The patient's employer's ID (from /employers call)
     * @param  null|string  $employerphone The patient's employer's phone number. Normally, this is set by setting employerid. However, setting this value can be used to override this on an individual patient.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $ethnicitycode Ethnicity of the patient, using the 2.16.840.1.113883.5.50 codeset. See http://www.hl7.org/implement/standards/fhir/terminologies-v3.html Special case: use "declined" to indicate that the patient declined to answer.
     * @param  null|string  $firstname Patient's legal first name (Max length: 20)
     * @param  null|string  $firstnameused First name the patient uses - may differ from legal first name (Max length: 20)
     * @param  null|string  $guarantoraddress1 Guarantor's address (Max length: 100)
     * @param  null|string  $guarantoraddress2 Guarantor's address - line 2 (Max length: 100)
     * @param  null|string  $guarantorcity Guarantor's city (Max length: 30)
     * @param  null|string  $guarantorcountrycode3166 Guarantor's country code (ISO 3166-1) (Max length: 20)
     * @param  null|string  $guarantordob Guarantor's DOB (mm/dd/yyyy)
     * @param  null|string  $guarantoremail Guarantor's email address
     * @param  null|int  $guarantoremployerid The guaranror's employer's ID (from /employers call)
     * @param  null|string  $guarantorfirstname Guarantor's first name (Max length: 20)
     * @param  null|string  $guarantorlastname Guarantor's last name (Max length: 20)
     * @param  null|string  $guarantormiddlename Guarantor's middle name (Max length: 20)
     * @param  null|string  $guarantorphone Guarantor's phone number.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $guarantorrelationshiptopatient The guarantor's relationship to the patient
     * @param  null|string  $guarantorssn Guarantor's SSN
     * @param  null|string  $guarantorstate Guarantor's state (2 letter abbreviation)
     * @param  null|string  $guarantorsuffix Guarantor's name suffix (Max length: 20)
     * @param  null|string  $guarantorzip Guarantor's zip
     * @param  null|string  $guardianfirstname The first name of the patient's guardian.
     * @param  null|string  $guardianlastname The last name of the patient's guardian.
     * @param  null|string  $guardianmiddlename The middle name of the patient's guardian.
     * @param  null|string  $guardiansuffix The suffix of the patient's guardian.
     * @param  null|string  $hasmobileyn Set to false if a client has declined a phone number.
     * @param  null|string  $hierarchicalcode The patient race hierarchical code (Max length: 20)
     * @param  null|bool  $homeboundyn If the patient is homebound, this is true.
     * @param  null|string  $homeless Used to identify this patient as homeless. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $homelesstype For patients that are homeless, provides more detail regarding the patient's homeless situation. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $homephone The patient's home phone number.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $ignorerestrictions Set to true to allow ability to find patients with record restrictions and blocked patients. This should only be used when there is no reflection to the patient at all that a match was found or not found. Will also add the confidentialitycode flag to the output for the patient. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|string  $industrycode Industry of the patient, using the US Census industry code (code system 2.16.840.1.113883.6.310).  "other" can be used as well.
     * @param  null|string  $language6392code Language of the patient, using the ISO 639.2 code. (http://www.loc.gov/standards/iso639-2/php/code_list.php; "T" or terminology code) Special case: use "declined" to indicate that the patient declined to answer.
     * @param  null|string  $lastname Patient's last name (Max length: 20)
     * @param  null|string  $maritalstatus Marital Status (D=Divorced, M=Married, S=Single, U=Unknown, W=Widowed, X=Separated, P=Partner)
     * @param  null|string  $middlename Patient's middle name (Max length: 20)
     * @param  null|string  $mobilecarrierid The ID of the mobile carrier, from /mobilecarriers or the list below.
     * @param  null|string  $mobilephone The patient's mobile phone number. On input, 'declined' can be used to indicate no number. (Alternatively, hasmobile can also be set to false. "declined" simply does this for you.)  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $nextkinname The full name of the next of kin.
     * @param  null|string  $nextkinphone The next of kin phone number.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $nextkinrelationship The next of kin relationship (one of SPOUSE, PARENT, CHILD, SIBLING, FRIEND, COUSIN, GUARDIAN, OTHER)
     * @param  null|string  $notes Notes associated with this patient.
     * @param  null|string  $occupationcode Occupation of the patient, using the US Census occupation code (code system 2.16.840.1.113883.6.240).  "other" can be used as well.
     * @param  null|bool  $omitbalances When true, current patient balances will not be calculated and the "balances" parameters will be omitted, speeding up the /patients endpoint.
     * @param  null|bool  $omitdefaultpharmacy When true, the default NCPDPID for patients will not be determined (and "defaultpharmacyncpdpid' will be omitted), speeding up the /patients endpoint.
     * @param  null|bool  $omitphotoinformation When true, current patient photo information will not be determined (and "patientphoto" and "patientphotourl" will be omitted), speeding up the /patients endpoint.
     * @param  null|string  $onlinestatementonlyyn Set to true if a patient wishes to get e-statements instead of paper statements. Should only be set for patients with an email address and clients with athenaCommunicator. The language we use in the portal is, "Future billing statements will be sent to you securely via your Patient Portal account. You will receive an email notice when new statements are available." This language is not required, but it is given as a suggestion.
     * @param  null|string  $portalaccessgiven This flag is set if the patient has been given access to the portal. This may be set by the API user if a patient has been given access to the portal "by providing a preprinted brochure or flyer showing the URL where patients can access their Patient Care Summaries." The practiceinfo endpoint can provide the portal URL. While technically allowed, it would be very unusual to set this to false via the API.
     * @param  null|string  $povertylevelcalculated Patient's poverty level (% of the Federal Poverty Level), as calculated from family size, income per pay period, pay period, and state. Typically only valued if client has Federal Poverty Level fields turned on.
     * @param  null|float|int  $povertylevelfamilysize Patient's family size (used for determining poverty level). Only settable if client has Federal Poverty Level fields turned on.
     * @param  null|bool  $povertylevelfamilysizedeclined Indicates if the patient delcines to provide "povertylevelfamilysize". Should be set to Yes if the patient declines.
     * @param  null|bool  $povertylevelincomedeclined Indicates if the patient delcines to provide "povertylevelincomeperpayperiod". Should be set to Yes if the patient declines.
     * @param  null|string  $povertylevelincomepayperiod Patient's pay period (used for determining poverty level). Only settable if client has Federal Poverty Level fields turned on.
     * @param  null|int  $povertylevelincomeperpayperiod Patient's income per specified pay period (used for determining poverty level). Only settable if client has Federal Poverty Level fields turned on.
     * @param  null|bool  $povertylevelincomerangedeclined Indicates whether or not the patient declines to provide an income level.
     * @param  null|string  $preferredname The patient's preferred name (i.e. nickname).
     * @param  null|string  $primarydepartmentid The patient's "current" department. This field is not always set by the practice.
     * @param  null|string  $primaryproviderid The "primary" provider for this patient, if set.
     * @param  null|string  $publichousing Used to identify this patient as living in public housing. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $race The patient race, using the 2.16.840.1.113883.5.104 codeset.  See http://www.hl7.org/implement/standards/fhir/terminologies-v3.html Special case: use "declined" to indicate that the patient declined to answer. Multiple values or a tab-seperated list of codes is acceptable for multiple races for input.  The first race will be considered "primary".  Note: you must update all values at once if you update any.
     * @param  null|string  $referralsourceid The referral / "how did you hear about us" ID.
     * @param  null|string  $registrationdate Date the patient was registered.
     * @param  null|string  $schoolbasedhealthcenter Used to identify this patient as school-based health center patient. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $sex Patient's sex (M/F)
     * @param  null|bool  $show2015edcehrtvalues When true, 2015 Ed. CEHRT compliant strings will be returned for describing gender identity and sexual orientation.
     * @param  null|string  $state Patient's state (2 letter abbreviation)
     * @param  null|string  $status The "status" of the patient, one of active, inactive, prospective, or deleted.
     * @param  null|string  $suffix Patient's name suffix (Max length: 20)
     * @param  null|int  $upcomingappointmenthours Used to identify patients with appointments scheduled within the upcoming input hours (maximum 24).  Also includes results from the previous 2 hours.
     * @param  null|string  $veteran Used to identify this patient as a veteran. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $workphone The patient's work phone number.  Generally not used to contact a patient.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $zip Patient's zip.  Matching occurs on first 5 characters.
     */
    public function __construct(
        protected ?string $address1 = null,
        protected ?string $address2 = null,
        protected ?string $agriculturalworker = null,
        protected ?string $agriculturalworkertype = null,
        protected ?string $anyphone = null,
        protected ?int $appointmentdepartmentid = null,
        protected ?string $appointmentproviderid = null,
        protected ?string $caresummarydeliverypreference = null,
        protected ?string $city = null,
        protected ?string $clinicalordertypegroupid = null,
        protected ?array $confidentialitycode = null,
        protected ?bool $consenttocall = null,
        protected ?bool $consenttotext = null,
        protected ?string $contacthomephone = null,
        protected ?string $contactmobilephone = null,
        protected ?string $contactname = null,
        protected ?string $contactpreference = null,
        protected ?bool $contactpreferenceAnnouncementEmail = null,
        protected ?bool $contactpreferenceAnnouncementPhone = null,
        protected ?bool $contactpreferenceAnnouncementSms = null,
        protected ?bool $contactpreferenceAppointmentEmail = null,
        protected ?bool $contactpreferenceAppointmentPhone = null,
        protected ?bool $contactpreferenceAppointmentSms = null,
        protected ?bool $contactpreferenceBillingEmail = null,
        protected ?bool $contactpreferenceBillingPhone = null,
        protected ?bool $contactpreferenceBillingSms = null,
        protected ?bool $contactpreferenceLabEmail = null,
        protected ?bool $contactpreferenceLabPhone = null,
        protected ?bool $contactpreferenceLabSms = null,
        protected ?string $contactrelationship = null,
        protected ?string $countrycode3166 = null,
        protected ?string $deceaseddate = null,
        protected ?string $defaultpharmacyncpdpid = null,
        protected ?int $departmentid = null,
        protected ?string $dob = null,
        protected ?string $driverslicenseexpirationdate = null,
        protected ?string $driverslicensenumber = null,
        protected ?string $driverslicensestateid = null,
        protected ?string $email = null,
        protected ?int $employerid = null,
        protected ?string $employerphone = null,
        protected ?string $ethnicitycode = null,
        protected ?string $firstname = null,
        protected ?string $firstnameused = null,
        protected ?string $guarantoraddress1 = null,
        protected ?string $guarantoraddress2 = null,
        protected ?string $guarantorcity = null,
        protected ?string $guarantorcountrycode3166 = null,
        protected ?string $guarantordob = null,
        protected ?string $guarantoremail = null,
        protected ?int $guarantoremployerid = null,
        protected ?string $guarantorfirstname = null,
        protected ?string $guarantorlastname = null,
        protected ?string $guarantormiddlename = null,
        protected ?string $guarantorphone = null,
        protected ?string $guarantorrelationshiptopatient = null,
        protected ?string $guarantorssn = null,
        protected ?string $guarantorstate = null,
        protected ?string $guarantorsuffix = null,
        protected ?string $guarantorzip = null,
        protected ?string $guardianfirstname = null,
        protected ?string $guardianlastname = null,
        protected ?string $guardianmiddlename = null,
        protected ?string $guardiansuffix = null,
        protected ?string $hasmobileyn = null,
        protected ?string $hierarchicalcode = null,
        protected ?bool $homeboundyn = null,
        protected ?string $homeless = null,
        protected ?string $homelesstype = null,
        protected ?string $homephone = null,
        protected ?string $ignorerestrictions = null,
        protected ?string $industrycode = null,
        protected ?string $language6392code = null,
        protected ?string $lastname = null,
        protected ?string $maritalstatus = null,
        protected ?string $middlename = null,
        protected ?string $mobilecarrierid = null,
        protected ?string $mobilephone = null,
        protected ?string $nextkinname = null,
        protected ?string $nextkinphone = null,
        protected ?string $nextkinrelationship = null,
        protected ?string $notes = null,
        protected ?string $occupationcode = null,
        protected ?bool $omitbalances = null,
        protected ?bool $omitdefaultpharmacy = null,
        protected ?bool $omitphotoinformation = null,
        protected ?string $onlinestatementonlyyn = null,
        protected ?string $portalaccessgiven = null,
        protected ?string $povertylevelcalculated = null,
        protected float|int|null $povertylevelfamilysize = null,
        protected ?bool $povertylevelfamilysizedeclined = null,
        protected ?bool $povertylevelincomedeclined = null,
        protected ?string $povertylevelincomepayperiod = null,
        protected ?int $povertylevelincomeperpayperiod = null,
        protected ?bool $povertylevelincomerangedeclined = null,
        protected ?string $preferredname = null,
        protected ?string $primarydepartmentid = null,
        protected ?string $primaryproviderid = null,
        protected ?string $publichousing = null,
        protected ?string $race = null,
        protected ?string $referralsourceid = null,
        protected ?string $registrationdate = null,
        protected ?string $schoolbasedhealthcenter = null,
        protected ?string $sex = null,
        protected ?bool $show2015edcehrtvalues = null,
        protected ?string $ssn = null,
        protected ?string $state = null,
        protected ?string $status = null,
        protected ?string $suffix = null,
        protected ?int $upcomingappointmenthours = null,
        protected ?string $veteran = null,
        protected ?string $workphone = null,
        protected ?string $zip = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'address1' => $this->address1,
            'address2' => $this->address2,
            'agriculturalworker' => $this->agriculturalworker,
            'agriculturalworkertype' => $this->agriculturalworkertype,
            'anyphone' => $this->anyphone,
            'appointmentdepartmentid' => $this->appointmentdepartmentid,
            'appointmentproviderid' => $this->appointmentproviderid,
            'caresummarydeliverypreference' => $this->caresummarydeliverypreference,
            'city' => $this->city,
            'clinicalordertypegroupid' => $this->clinicalordertypegroupid,
            'confidentialitycode' => $this->confidentialitycode,
            'consenttocall' => $this->consenttocall,
            'consenttotext' => $this->consenttotext,
            'contacthomephone' => $this->contacthomephone,
            'contactmobilephone' => $this->contactmobilephone,
            'contactname' => $this->contactname,
            'contactpreference' => $this->contactpreference,
            'contactpreference_announcement_email' => $this->contactpreferenceAnnouncementEmail,
            'contactpreference_announcement_phone' => $this->contactpreferenceAnnouncementPhone,
            'contactpreference_announcement_sms' => $this->contactpreferenceAnnouncementSms,
            'contactpreference_appointment_email' => $this->contactpreferenceAppointmentEmail,
            'contactpreference_appointment_phone' => $this->contactpreferenceAppointmentPhone,
            'contactpreference_appointment_sms' => $this->contactpreferenceAppointmentSms,
            'contactpreference_billing_email' => $this->contactpreferenceBillingEmail,
            'contactpreference_billing_phone' => $this->contactpreferenceBillingPhone,
            'contactpreference_billing_sms' => $this->contactpreferenceBillingSms,
            'contactpreference_lab_email' => $this->contactpreferenceLabEmail,
            'contactpreference_lab_phone' => $this->contactpreferenceLabPhone,
            'contactpreference_lab_sms' => $this->contactpreferenceLabSms,
            'contactrelationship' => $this->contactrelationship,
            'countrycode3166' => $this->countrycode3166,
            'deceaseddate' => $this->deceaseddate,
            'defaultpharmacyncpdpid' => $this->defaultpharmacyncpdpid,
            'departmentid' => $this->departmentid,
            'dob' => $this->dob,
            'driverslicenseexpirationdate' => $this->driverslicenseexpirationdate,
            'driverslicensenumber' => $this->driverslicensenumber,
            'driverslicensestateid' => $this->driverslicensestateid,
            'email' => $this->email,
            'employerid' => $this->employerid,
            'employerphone' => $this->employerphone,
            'ethnicitycode' => $this->ethnicitycode,
            'firstname' => $this->firstname,
            'firstnameused' => $this->firstnameused,
            'guarantoraddress1' => $this->guarantoraddress1,
            'guarantoraddress2' => $this->guarantoraddress2,
            'guarantorcity' => $this->guarantorcity,
            'guarantorcountrycode3166' => $this->guarantorcountrycode3166,
            'guarantordob' => $this->guarantordob,
            'guarantoremail' => $this->guarantoremail,
            'guarantoremployerid' => $this->guarantoremployerid,
            'guarantorfirstname' => $this->guarantorfirstname,
            'guarantorlastname' => $this->guarantorlastname,
            'guarantormiddlename' => $this->guarantormiddlename,
            'guarantorphone' => $this->guarantorphone,
            'guarantorrelationshiptopatient' => $this->guarantorrelationshiptopatient,
            'guarantorssn' => $this->guarantorssn,
            'guarantorstate' => $this->guarantorstate,
            'guarantorsuffix' => $this->guarantorsuffix,
            'guarantorzip' => $this->guarantorzip,
            'guardianfirstname' => $this->guardianfirstname,
            'guardianlastname' => $this->guardianlastname,
            'guardianmiddlename' => $this->guardianmiddlename,
            'guardiansuffix' => $this->guardiansuffix,
            'hasmobileyn' => $this->hasmobileyn,
            'hierarchicalcode' => $this->hierarchicalcode,
            'homeboundyn' => $this->homeboundyn,
            'homeless' => $this->homeless,
            'homelesstype' => $this->homelesstype,
            'homephone' => $this->homephone,
            'ignorerestrictions' => $this->ignorerestrictions,
            'industrycode' => $this->industrycode,
            'language6392code' => $this->language6392code,
            'lastname' => $this->lastname,
            'maritalstatus' => $this->maritalstatus,
            'middlename' => $this->middlename,
            'mobilecarrierid' => $this->mobilecarrierid,
            'mobilephone' => $this->mobilephone,
            'nextkinname' => $this->nextkinname,
            'nextkinphone' => $this->nextkinphone,
            'nextkinrelationship' => $this->nextkinrelationship,
            'notes' => $this->notes,
            'occupationcode' => $this->occupationcode,
            'omitbalances' => $this->omitbalances,
            'omitdefaultpharmacy' => $this->omitdefaultpharmacy,
            'omitphotoinformation' => $this->omitphotoinformation,
            'onlinestatementonlyyn' => $this->onlinestatementonlyyn,
            'portalaccessgiven' => $this->portalaccessgiven,
            'povertylevelcalculated' => $this->povertylevelcalculated,
            'povertylevelfamilysize' => $this->povertylevelfamilysize,
            'povertylevelfamilysizedeclined' => $this->povertylevelfamilysizedeclined,
            'povertylevelincomedeclined' => $this->povertylevelincomedeclined,
            'povertylevelincomepayperiod' => $this->povertylevelincomepayperiod,
            'povertylevelincomeperpayperiod' => $this->povertylevelincomeperpayperiod,
            'povertylevelincomerangedeclined' => $this->povertylevelincomerangedeclined,
            'preferredname' => $this->preferredname,
            'primarydepartmentid' => $this->primarydepartmentid,
            'primaryproviderid' => $this->primaryproviderid,
            'publichousing' => $this->publichousing,
            'race' => $this->race,
            'referralsourceid' => $this->referralsourceid,
            'registrationdate' => $this->registrationdate,
            'schoolbasedhealthcenter' => $this->schoolbasedhealthcenter,
            'sex' => $this->sex,
            'show2015edcehrtvalues' => $this->show2015edcehrtvalues,
            'ssn' => $this->ssn,
            'state' => $this->state,
            'status' => $this->status,
            'suffix' => $this->suffix,
            'upcomingappointmenthours' => $this->upcomingappointmenthours,
            'veteran' => $this->veteran,
            'workphone' => $this->workphone,
            'zip' => $this->zip,
        ]);
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): array
    {
        dd($response->json());
        return collect($response->json($this->itemsKey))
            ->map(fn (array $patient) => [
                'athena_id' => $patient['patientid'],
                'first_name' => $patient['firstname'],
                'last_name' => $patient['lastname'],
                'mobile_phone' => $patient['mobilephone'],
                'home_phone' => $patient['homephone'],
                'email' => $patient['email'],
                'sms_consent' => $patient['consenttotext'],
                // Email consent is missing
            ])->all();
    }
}

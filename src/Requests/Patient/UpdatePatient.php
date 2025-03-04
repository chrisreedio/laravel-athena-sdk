<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient;

use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use Illuminate\Support\Facades\Log;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatient
 *
 * Modifies data of a specific patient Note: This endpoint may rely on specific settings to be enabled
 * in athenaNet Production to function properly that are not required in other environments. Please see
 * <a href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout
 * of APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatient extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientId}";
    }

    public function __construct(public int $patientId, public PatientData $patient) {}

    public function defaultBody(): array
    {
        // Extract guarantor and emergency contact data from the PatientData object
        $guarantor = $this->patient->guarantor;
        $emergencyContact = $this->patient->emergencyContact;
        $dateFormat = 'm/d/Y';

        // Start building the request body with data from PatientData
        $body = [
            'firstname' => $this->patient->firstName,
            'lastname' => $this->patient->lastName,
            'sex' => $this->patient->sex,
            'dob' => $this->patient->dob?->format($dateFormat),
            'email' => $this->patient->email,
            'homephone' => $this->patient->homePhone,
            'mobilephone' => $this->patient->mobilePhone,

            // Address
            'address1' => $this->patient->address->street,
            'address2' => $this->patient->address->suite,
            'city' => $this->patient->address->city,
            'state' => $this->patient->address->state,
            'zip' => $this->patient->address->zip,
            'countrycode3166' => $this->patient->address->countryCode3166,
            'countrycode' => $this->patient->address->countryCode,

            // Contact Preferences
            'consenttocall' => $this->patient->consentToCall,
            'consenttotext' => $this->patient->consentToText,
            'contactpreference' => $this->patient->contactPreference,

            // Race, Ethnicities, and Language
            // 'race' => $this->patient->race,
            // 'racecode' => $this->patient->raceCode,
            // TODO: temporary fix
            'race' => $this->patient->raceCode,

            // 'ethnicities' => $this->patient->ethnicities,
            'ethnicitycode' => $this->patient->ethnicityCode,
            'language6392code' => $this->patient->languageCode,

            // Primary Provider and Department
            'primaryproviderid' => $this->patient->primaryProviderId,
            'primarydepartmentid' => $this->patient->primaryDepartmentId,
        ];

        // Add GuarantorData fields if available
        if ($guarantor) {
            $body += [
                'guarantorfirstname' => $guarantor->first_name,
                'guarantorlastname' => $guarantor->last_name,
                'guarantoraddress1' => $guarantor->address1,
                'guarantoraddress2' => $guarantor->address2,
                'guarantorcity' => $guarantor->city,
                'guarantorstate' => $guarantor->state,
                'guarantorzip' => $guarantor->zip,
                'guarantorcountrycode3166' => $guarantor->countryCode3166,
                'guarantorcountrycode' => $guarantor->countryCode,
                'guarantorphone' => $guarantor->phone,
                'guarantoremail' => $guarantor->email,
                'guarantordob' => $guarantor->birthday?->format($dateFormat),
                // ... add other fields from GuarantorData as required ...
            ];
        }

        // Add EmergencyContactData fields if available
        if ($emergencyContact) {
            $body += [
                'contactname' => $emergencyContact->name,
                'contactrelationship' => $emergencyContact->relationship,
                'contacthomephone' => $emergencyContact->homePhone,
                'contactmobilephone' => $emergencyContact->mobilePhone,
                // ... add other fields from EmergencyContactData as required ...
            ];
        }

        Log::error('UpdatePatient body', ['body' => $body]);

        // Remove null values to clean up the request body
        return array_filter($body, fn ($value) => ! is_null($value));
    }

    // region Old Code
    /**
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $address1  Patient's address - 1st line (Max length: 100)
     * @param  null|string  $address2  Patient's address - 2nd line (Max length: 100)
     * @param  null|string  $agriculturalworker  Used to identify this patient as an agricultural worker. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $agriculturalworkertype  For patients that are agricultural workers, identifies the type of worker. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $altfirstname  Alternate first name that differs from legal name. This is only available in practices with the appropriate practice settings.
     * @param  null|string  $assignedsexatbirth  Sex that this patient was assigned at birth. This is only available in practices with the appropriate practice settings.
     * @param  null|string  $caresummarydeliverypreference  The patient's preference for care summary delivery.
     * @param  null|string  $city  Patient's city (Max length: 30)
     * @param  null|string  $clinicalordertypegroupid  The clinical order type group of the clinical provider (Prescription: 10, Lab: 11, Vaccinations: 16).
     * @param  null|bool  $consenttocall  The flag is used to record the consent of a patient to receive automated calls per FCC requirements. The requested legal language is 'Entry of any telephone contact number constitutes written consent to receive any automated, prerecorded, and artificial voice telephone calls initiated by the Practice. To alter or revoke this consent, visit the Patient Portal "Contact Preferences" page.'
     * @param  null|bool  $consenttotext  The flag is used to record the consent of a patient to receive text messages per FCC requirements. In order for this to be true, a valid mobile phone number must be set and the practice setting "Hide SMS Opt-in option" must be set to Off.
     * @param  null|string  $contacthomephone  Emergency contact home phone.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $contactmobilephone  Emergency contact mobile phone.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $contactname  The name of the (emergency) person to contact about the patient. The contactname, contactrelationship, contacthomephone, and contactmobilephone fields are all related to the emergency contact for the patient. They are NOT related to the contractpreference_* fields.
     * @param  null|string  $contactpreference  The MU-required field for "preferred contact method". This is not used by any automated systems.
     * @param  null|bool  $contactpreferenceAnnouncementEmail  If set, the patient has indicated a preference to get or not get "announcement" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceAnnouncementPhone  If set, the patient has indicated a preference to get or not get "announcement" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceAnnouncementSms  If set, the patient has indicated a preference to get or not get "announcement" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|bool  $contactpreferenceAppointmentEmail  If set, the patient has indicated a preference to get or not get "appointment" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceAppointmentPhone  If set, the patient has indicated a preference to get or not get "appointment" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceAppointmentSms  If set, the patient has indicated a preference to get or not get "appointment" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|bool  $contactpreferenceBillingEmail  If set, the patient has indicated a preference to get or not get "billing" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceBillingPhone  If set, the patient has indicated a preference to get or not get "billing" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceBillingSms  If set, the patient has indicated a preference to get or not get "billing" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|bool  $contactpreferenceLabEmail  If set, the patient has indicated a preference to get or not get "lab" communications delivered via email.  Note that this will not be present if the practice or patient has not set it.For completeness, turning email off is supported via the API, but it is discouraged. When email is off, patients may not not get messages from the patient portal.
     * @param  null|bool  $contactpreferenceLabPhone  If set, the patient has indicated a preference to get or not get "lab" communications delivered via phone.  Note that this will not be present if the practice or patient has not set it.
     * @param  null|bool  $contactpreferenceLabSms  If set, the patient has indicated a preference to get or not get "lab" communications delivered via SMS.  Note that this will not be present if the practice or patient has not set it.For SMS, there is specific terms of service language that must be used when displaying this as an option to be turned on.  Turning on must be an action by the patient, not a practice user.
     * @param  null|string  $contactrelationship  Emergency contact relationship (one of SPOUSE, PARENT, CHILD, SIBLING, FRIEND, COUSIN, GUARDIAN, OTHER)
     * @param  null|string  $countrycode3166  Patient's country code (ISO 3166-1)
     * @param  null|string  $deceaseddate  If present, the date on which a patient died.
     * @param  null|string  $defaultpharmacyncpdpid  The NCPDP ID of the patient's preferred pharmacy.  See http://www.ncpdp.org/ for details. Note: if updating this field, please make sure to have a CLINICALORDERTYPEGROUPID field as well.
     * @param  null|int  $departmentid  Primary (registration) department ID.
     * @param  null|string  $dob  Patient's DOB (mm/dd/yyyy)
     * @param  null|bool  $donotcallyn  Warning! This patient will not receive any communication from the practice if this field is set to true. This field should only be used if you are absolutely certain that's what you want to do.
     * @param  null|string  $driverslicenseexpirationdate  The expiration date of the patient's driver's license.
     * @param  null|string  $driverslicensenumber  The number of the patient's driver's license
     * @param  null|string  $driverslicensestateid  The state of the patient's driver's license. This is in the form of a 2 letter state code.
     * @param  null|string  $email  Patient's email address.  'declined' can be used to indicate just that.
     * @param  null|int  $employerid  The patient's employer's ID (from /employers call)
     * @param  null|string  $employerphone  The patient's employer's phone number. Normally, this is set by setting employerid. However, setting this value can be used to override this on an individual patient.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $ethnicitycode  Ethnicity of the patient, using the 2.16.840.1.113883.5.50 codeset. See http://www.hl7.org/implement/standards/fhir/terminologies-v3.html Special case: use "declined" to indicate that the patient declined to answer.
     * @param  null|string  $ethnicitycodes  Ethnicities of the patient, using the 2.16.840.1.113883.5.50 codeset. See http://www.hl7.org/implement/standards/fhir/terminologies-v3.html Special case: use "declined" to indicate that the patient declined to answer. Multiple values or a tab-seperated list of codes is acceptable for multiple ethnicities for input.  The first ethnicity will be considered "primary".  Note: you must update all values at once if you update any. THIS FIELD IS ONLY AVAILABLE WHEN COLPROM_MDP_PATIENT_API_ETHNICITYIDS IS ON.
     * @param  null|string  $firstname  Patient's first name
     * @param  null|string  $genderidentity  Gender this patient identifies with. This is only available in practices with the appropriate practice settings. To see the available options for this input, please see GET /configuration/patients/genderidentity?show2015edcehrtvalues=true
     * @param  null|string  $genderidentityother  Only valid when used in conjunction with a gender identity choice that allows the patient to describe their identity (if it doesn't conform to any other choice).
     * @param  null|string  $guarantoraddress1  Guarantor's address (Max length: 100)
     * @param  null|string  $guarantoraddress2  Guarantor's address - line 2 (Max length: 100)
     * @param  null|bool  $guarantoraddresssameaspatient  If set, the address of the guarantor is the same as the patient.
     * @param  null|string  $guarantorcity  Guarantor's city (Max length: 30)
     * @param  null|string  $guarantorcountrycode3166  Guarantor's country code (ISO 3166-1)
     * @param  null|string  $guarantordob  Guarantor's DOB (mm/dd/yyyy)
     * @param  null|string  $guarantoremail  Guarantor's email address
     * @param  null|int  $guarantoremployerid  The guaranror's employer's ID (from /employers call)
     * @param  null|string  $guarantorfirstname  Guarantor's first name
     * @param  null|string  $guarantorlastname  Guarantor's last name
     * @param  null|string  $guarantormiddlename  Guarantor's middle name
     * @param  null|string  $guarantorphone  Guarantor's phone number.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $guarantorrelationshiptopatient  The guarantor's relationship to the patient
     * @param  null|string  $guarantorssn  Guarantor's SSN
     * @param  null|string  $guarantorstate  Guarantor's state (2 letter abbreviation)
     * @param  null|string  $guarantorsuffix  Guarantor's name suffix
     * @param  null|string  $guarantorzip  Guarantor's zip
     * @param  null|string  $guardianfirstname  The first name of the patient's guardian.
     * @param  null|string  $guardianlastname  The last name of the patient's guardian.
     * @param  null|string  $guardianmiddlename  The middle name of the patient's guardian.
     * @param  null|string  $guardiansuffix  The suffix of the patient's guardian.
     * @param  null|bool  $hasmobileyn  Set to false if a client has declined a phone number.
     * @param  null|bool  $homeboundyn  If the patient is homebound, this is true.
     * @param  null|string  $homeless  Used to identify this patient as homeless. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $homelesstype  For patients that are homeless, provides more detail regarding the patient's homeless situation. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $homephone  The patient's home phone number.  Invalid numbers in a GET will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA. Only phone numbers that exist in the North American Naming Plan (NANP) are acceptable for input.
     * @param  null|bool  $ignorerestrictions  Set to true to allow ability to find patients with record restrictions and blocked patients. This should only be used when there is no reflection to the patient at all that a match was found or not found.
     * @param  null|string  $industrycode  Industry of the patient, using the US Census industry code (code system 2.16.840.1.113883.6.310).  "other" can be used as well.
     * @param  null|string  $language6392code  Language of the patient, using the ISO 639.2 code. (http://www.loc.gov/standards/iso639-2/php/code_list.php; "T" or terminology code) Special case: use "declined" to indicate that the patient declined to answer.
     * @param  null|string  $lastname  Patient's last name
     * @param  null|int  $lookupdepartmentid  Use this in practices that register copies of patients in different departments in order to make sure you are updating the correct version of the patient.
     * @param  null|string  $maritalstatus  Marital Status (D=Divorced, M=Married, S=Single, U=Unknown, W=Widowed, X=Separated, P=Partner)
     * @param  null|string  $middlename  Patient's middle name
     * @param  null|string  $mobilecarrierid  The ID of the mobile carrier, from /mobilecarriers or the list below.
     * @param  null|string  $mobilephone  The patient's mobile phone number. On input, 'declined' can be used to indicate no number. (Alternatively, hasmobile can also be set to false. "declined" simply does this for you.)  Invalid numbers in a GET will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA. Only phone numbers that exist in the North American Naming Plan (NANP) are acceptable for input.
     * @param  null|string  $nextkinname  The full name of the next of kin.
     * @param  null|string  $nextkinphone  The next of kin phone number.  Invalid numbers in a GET/PUT will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA.  Invalid numbers in a POST will be ignored, possibly resulting in an error.
     * @param  null|string  $nextkinrelationship  The next of kin relationship (one of SPOUSE, PARENT, CHILD, SIBLING, FRIEND, COUSIN, GUARDIAN, OTHER)
     * @param  null|string  $notes  Notes associated with this patient.
     * @param  null|string  $occupationcode  Occupation of the patient, using the US Census occupation code (code system 2.16.840.1.113883.6.240).  "other" can be used as well.
     * @param  null|bool  $onlinestatementonlyyn  Set to true if a patient wishes to get e-statements instead of paper statements. Should only be set for patients with an email address and clients with athenaCommunicator. The language we use in the portal is, "Future billing statements will be sent to you securely via your Patient Portal account. You will receive an email notice when new statements are available." This language is not required, but it is given as a suggestion.
     * @param  null|bool  $portalaccessgiven  This flag is set if the patient has been given access to the portal. This may be set by the API user if a patient has been given access to the portal "by providing a preprinted brochure or flyer showing the URL where patients can access their Patient Care Summaries." The practiceinfo endpoint can provide the portal URL. While technically allowed, it would be very unusual to set this to false via the API.
     * @param  null|number  $povertylevelcalculated  Patient's poverty level (% of the Federal Poverty Level), as calculated from family size, income per pay period, pay period, and state. Typically only valued if client has Federal Poverty Level fields turned on.
     * @param  null|number  $povertylevelfamilysize  Patient's family size (used for determining poverty level). Only settable if client has Federal Poverty Level fields turned on.
     * @param  null|bool  $povertylevelfamilysizedeclined  Indicates if the patient delcines to provide "povertylevelfamilysize". Should be set to Yes if the patient declines.
     * @param  null|bool  $povertylevelincomedeclined  Indicates if the patient delcines to provide "povertylevelincomeperpayperiod". Should be set to Yes if the patient declines.
     * @param  null|string  $povertylevelincomepayperiod  Patient's pay period (used for determining poverty level). Only settable if client has Federal Poverty Level fields turned on.
     * @param  null|number  $povertylevelincomeperpayperiod  Patient's income per specified pay period (used for determining poverty level). Only settable if client has Federal Poverty Level fields turned on.
     * @param  null|bool  $povertylevelincomerangedeclined  Indicates whether or not the patient declines to provide an income level (povertylevelcalculated).
     * @param  null|string  $preferredname  The patient's preferred name (i.e. nickname).
     * @param  null|string  $preferredpronouns  Pronoun this patient uses.  This is only available in practices with the appropriate practice settings.
     * @param  null|string  $primarydepartmentid  The patient's "current" department. This field is not always set by the practice.
     * @param  null|string  $primaryproviderid  The "primary" provider for this patient, if set.
     * @param  null|string  $publichousing  Used to identify this patient as living in public housing. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $race  The patient race, using the 2.16.840.1.113883.5.104 codeset. See http://www.hl7.org/implement/standards/fhir/terminologies-v3.html Special case: use "declined" to indicate that the patient declined to answer. Multiple values or a tab-seperated list of codes is acceptable for multiple races for input. The first race will be considered "primary".  Note: you must update all values at once if you update any.
     * @param  null|string  $referralsourceid  The referral / "how did you hear about us" ID.
     * @param  null|string  $referralsourceother  If selecting "other" for referral source, this is the text field that can be filled out.
     * @param  null|bool  $registerpatientindepartment  If you use LOOKUPDEPARTMENTID to get the local copy of a patient to update, and if the patient is not currently registered in that department, setting this flag will register a new copy of this patient in that department.
     * @param  null|bool  $returnerroroninvalidemail  Returns Error on invalid email if true, default false.
     * @param  null|string  $schoolbasedhealthcenter  Used to identify this patient as school-based health center patient. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $sex  Patient's sex (M/F)
     * @param  null|string  $sexualorientation  Sexual orientation of this patient. This is only available in practices with the appropriate practice settings.
     * @param  null|string  $sexualorientationother  Only valid when used in conjunction with a sexual orientation choice that allows the patient to describe their orientation (if it doesn't conform to any other choice).
     * @param  null|string  $state  Patient's state (2 letter abbreviation)
     * @param  null|string  $status  The "status" of the patient, either active, inactive or prospective
     * @param  null|string  $suffix  Patient's name suffix
     * @param  null|string  $veteran  Used to identify this patient as a veteran. Only settable if client has Social Determinant fields turned on.
     * @param  null|string  $workphone  The patient's work phone number.  Generally not used to contact a patient.  Invalid numbers in a GET will be ignored.  Patient phone numbers and other data may change, and one phone number may be associated with multiple patients. You are responsible for taking additional steps to verify patient identity and for using this data in accordance with applicable law, including HIPAA. Only phone numbers that exist in the North American Naming Plan (NANP) are acceptable for input.
     * @param  null|string  $zip  Patient's zip.  Matching occurs on first 5 characters.
     */
    /*
    public function __construct(
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $address1 = null,
        protected ?string $address2 = null,
        protected ?string $agriculturalworker = null,
        protected ?string $agriculturalworkertype = null,
        protected ?string $altfirstname = null,
        protected ?string $assignedsexatbirth = null,
        protected ?string $caresummarydeliverypreference = null,
        protected ?string $city = null,
        protected ?string $clinicalordertypegroupid = null,
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
        protected ?bool $donotcallyn = null,
        protected ?string $driverslicenseexpirationdate = null,
        protected ?string $driverslicensenumber = null,
        protected ?string $driverslicensestateid = null,
        protected ?string $email = null,
        protected ?int $employerid = null,
        protected ?string $employerphone = null,
        protected ?string $ethnicitycode = null,
        protected ?string $ethnicitycodes = null,
        protected ?string $firstname = null,
        protected ?string $genderidentity = null,
        protected ?string $genderidentityother = null,
        protected ?string $guarantoraddress1 = null,
        protected ?string $guarantoraddress2 = null,
        protected ?bool $guarantoraddresssameaspatient = null,
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
        protected ?bool $hasmobileyn = null,
        protected ?bool $homeboundyn = null,
        protected ?string $homeless = null,
        protected ?string $homelesstype = null,
        protected ?string $homephone = null,
        protected ?bool $ignorerestrictions = null,
        protected ?string $industrycode = null,
        protected ?string $language6392code = null,
        protected ?string $lastname = null,
        protected ?int $lookupdepartmentid = null,
        protected ?string $maritalstatus = null,
        protected ?string $middlename = null,
        protected ?string $mobilecarrierid = null,
        protected ?string $mobilephone = null,
        protected ?string $nextkinname = null,
        protected ?string $nextkinphone = null,
        protected ?string $nextkinrelationship = null,
        protected ?string $notes = null,
        protected ?string $occupationcode = null,
        protected ?bool $onlinestatementonlyyn = null,
        protected ?bool $portalaccessgiven = null,
        protected ?\number $povertylevelcalculated = null,
        protected ?\number $povertylevelfamilysize = null,
        protected ?bool $povertylevelfamilysizedeclined = null,
        protected ?bool $povertylevelincomedeclined = null,
        protected ?string $povertylevelincomepayperiod = null,
        protected ?\number $povertylevelincomeperpayperiod = null,
        protected ?bool $povertylevelincomerangedeclined = null,
        protected ?string $preferredname = null,
        protected ?string $preferredpronouns = null,
        protected ?string $primarydepartmentid = null,
        protected ?string $primaryproviderid = null,
        protected ?string $publichousing = null,
        protected ?string $race = null,
        protected ?string $referralsourceid = null,
        protected ?string $referralsourceother = null,
        protected ?bool $registerpatientindepartment = null,
        protected ?bool $returnerroroninvalidemail = null,
        protected ?string $schoolbasedhealthcenter = null,
        protected ?string $sex = null,
        protected ?string $sexualorientation = null,
        protected ?string $sexualorientationother = null,
        protected ?string $ssn = null,
        protected ?string $state = null,
        protected ?string $status = null,
        protected ?string $suffix = null,
        protected ?string $veteran = null,
        protected ?string $workphone = null,
        protected ?string $zip = null,
    ) {
    }
    */

    /*
    public function defaultBody(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'agriculturalworker' => $this->agriculturalworker,
            'agriculturalworkertype' => $this->agriculturalworkertype,
            'altfirstname' => $this->altfirstname,
            'assignedsexatbirth' => $this->assignedsexatbirth,
            'caresummarydeliverypreference' => $this->caresummarydeliverypreference,
            'city' => $this->city,
            'clinicalordertypegroupid' => $this->clinicalordertypegroupid,
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
            'donotcallyn' => $this->donotcallyn,
            'driverslicenseexpirationdate' => $this->driverslicenseexpirationdate,
            'driverslicensenumber' => $this->driverslicensenumber,
            'driverslicensestateid' => $this->driverslicensestateid,
            'email' => $this->email,
            'employerid' => $this->employerid,
            'employerphone' => $this->employerphone,
            'ethnicitycode' => $this->ethnicitycode,
            'ethnicitycodes' => $this->ethnicitycodes,
            'firstname' => $this->firstname,
            'genderidentity' => $this->genderidentity,
            'genderidentityother' => $this->genderidentityother,
            'guarantoraddress1' => $this->guarantoraddress1,
            'guarantoraddress2' => $this->guarantoraddress2,
            'guarantoraddresssameaspatient' => $this->guarantoraddresssameaspatient,
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
            'homeboundyn' => $this->homeboundyn,
            'homeless' => $this->homeless,
            'homelesstype' => $this->homelesstype,
            'homephone' => $this->homephone,
            'ignorerestrictions' => $this->ignorerestrictions,
            'industrycode' => $this->industrycode,
            'language6392code' => $this->language6392code,
            'lastname' => $this->lastname,
            'lookupdepartmentid' => $this->lookupdepartmentid,
            'maritalstatus' => $this->maritalstatus,
            'middlename' => $this->middlename,
            'mobilecarrierid' => $this->mobilecarrierid,
            'mobilephone' => $this->mobilephone,
            'nextkinname' => $this->nextkinname,
            'nextkinphone' => $this->nextkinphone,
            'nextkinrelationship' => $this->nextkinrelationship,
            'notes' => $this->notes,
            'occupationcode' => $this->occupationcode,
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
            'preferredpronouns' => $this->preferredpronouns,
            'primarydepartmentid' => $this->primarydepartmentid,
            'primaryproviderid' => $this->primaryproviderid,
            'publichousing' => $this->publichousing,
            'race' => $this->race,
            'referralsourceid' => $this->referralsourceid,
            'referralsourceother' => $this->referralsourceother,
            'registerpatientindepartment' => $this->registerpatientindepartment,
            'returnerroroninvalidemail' => $this->returnerroroninvalidemail,
            'schoolbasedhealthcenter' => $this->schoolbasedhealthcenter,
            'sex' => $this->sex,
            'sexualorientation' => $this->sexualorientation,
            'sexualorientationother' => $this->sexualorientationother,
            'ssn' => $this->ssn,
            'state' => $this->state,
            'status' => $this->status,
            'suffix' => $this->suffix,
            'veteran' => $this->veteran,
            'workphone' => $this->workphone,
            'zip' => $this->zip,
        ]);
    }
    */
    // endregion
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsurance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientInsurance
 *
 * Creates a new record of patient insurance for a specific patient
 */
class CreatePatientInsurance extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances";
    }

    /**
     * @param int $insurancepackageid The athenaNet insurance package ID.
     * @param int $patientid patientid
     * @param null|int $departmentid If set, we will use the department id in an attempt to add to the local patient.
     * @param null|string $expirationdate Set the date that the insurance will expire. This is usually a date within the next year and not in the past.
     * @param null|string $insuranceidnumber The insurance policy ID number (as presented on the insurance card itself).
     * @param null|string $insurancephone The phone number for the insurance company. Note: This defaults to the insurance package phone number. If this is set, it will override it. Likewise if blanked out, it will go back to default.
     * @param null|string $insurancepolicyholder Name of the entity who holds this insurance policy. Required if entity type is set to non-person.
     * @param null|string $insurancepolicyholderaddress1 The first address line of the insurance policy holder.
     * @param null|string $insurancepolicyholderaddress2 The second address line of the insurance policy holder.
     * @param null|string $insurancepolicyholdercity The city of the insurance policy holder.
     * @param null|string $insurancepolicyholdercountrycode The country code (3 letter) of the insurance policy holder.  Either this or insurancepolicyholdercountryiso3166 are acceptable.  Defaults to USA.
     * @param null|string $insurancepolicyholdercountryiso3166 The <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166</a> country code of the insurance policy holder.  Either this or insurancepolicyholdercountrycode are acceptable.  Defaults to US.
     * @param null|string $insurancepolicyholderdob The DOB of the insurance policy holder (mm/dd/yyyy).
     * @param null|string $insurancepolicyholderfirstname The first name of the insurance policy holder.  Except for self-pay, required for new policies.
     * @param null|string $insurancepolicyholderlastname The last name of the insurance policy holder.  Except for self-pay, required for new policies.
     * @param null|string $insurancepolicyholdermiddlename The middle name of the insurance policy holder.
     * @param null|string $insurancepolicyholdersex The sex of the insurance policy holder.  Except for self-pay, required for new policies.
     * @param null|string $insurancepolicyholderssn The SSN of the insurance policy holder.
     * @param null|string $insurancepolicyholderstate The state of the insurance policy holder.
     * @param null|string $insurancepolicyholdersuffix The suffix of the insurance policy holder.
     * @param null|string $insurancepolicyholderzip The zip of the insurance policy holder.
     * @param null|string $insuredentitytypeid
     * @param null|string $issuedate Set the date that the insurance was issued. This is usually a date in the past year and not in the future.
     * @param null|string $policynumber The insurance group number.  This is sometimes present on an insurance card.
     * @param null|int $relationshiptoinsuredid This patient's relationship to the policy holder (as an ID).  See <a href="/workflows/patient-relationship-mapping"> the mapping</a>. Please note that if this is set to 12, Entity Type must be set to 2.
     * @param null|int $sequencenumber 1 = primary, 2 = secondary.  Must have a primary before a secondary. This field is required if the insurance package is not a case policy.
     * @param null|bool $updateappointments If set to true, automatically updates all future appointments to use this insurance as primary or secondary, respective to the sequence number.
     * @param null|bool $validateinsuranceidnumber BETA FIELD: If true, this makes sure that you have entered a valid INSURANCEIDNUMBER.  If you didn't it will error.  Setting this is probably a good thing and means you shouldn't have to do a ton of validation on the ID number.
     */
    public function __construct(
        protected int     $insurancepackageid,
        protected int     $patientid,
        protected ?int    $departmentid = null,
        protected ?string $expirationdate = null,
        protected ?string $insuranceidnumber = null,
        protected ?string $insurancephone = null,
        protected ?string $insurancepolicyholder = null,
        protected ?string $insurancepolicyholderaddress1 = null,
        protected ?string $insurancepolicyholderaddress2 = null,
        protected ?string $insurancepolicyholdercity = null,
        protected ?string $insurancepolicyholdercountrycode = null,
        protected ?string $insurancepolicyholdercountryiso3166 = null,
        protected ?string $insurancepolicyholderdob = null,
        protected ?string $insurancepolicyholderfirstname = null,
        protected ?string $insurancepolicyholderlastname = null,
        protected ?string $insurancepolicyholdermiddlename = null,
        protected ?string $insurancepolicyholdersex = null,
        protected ?string $insurancepolicyholderssn = null,
        protected ?string $insurancepolicyholderstate = null,
        protected ?string $insurancepolicyholdersuffix = null,
        protected ?string $insurancepolicyholderzip = null,
        protected ?string $insuredentitytypeid = null,
        protected ?string $issuedate = null,
        protected ?string $policynumber = null,
        protected ?int    $relationshiptoinsuredid = null,
        protected ?int    $sequencenumber = null,
        protected ?bool   $updateappointments = null,
        protected ?bool   $validateinsuranceidnumber = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'insurancepackageid' => $this->insurancepackageid,
            'departmentid' => $this->departmentid,
            'expirationdate' => $this->expirationdate,
            'insuranceidnumber' => $this->insuranceidnumber,
            'insurancephone' => $this->insurancephone,
            'insurancepolicyholder' => $this->insurancepolicyholder,
            'insurancepolicyholderaddress1' => $this->insurancepolicyholderaddress1,
            'insurancepolicyholderaddress2' => $this->insurancepolicyholderaddress2,
            'insurancepolicyholdercity' => $this->insurancepolicyholdercity,
            'insurancepolicyholdercountrycode' => $this->insurancepolicyholdercountrycode,
            'insurancepolicyholdercountryiso3166' => $this->insurancepolicyholdercountryiso3166,
            'insurancepolicyholderdob' => $this->insurancepolicyholderdob,
            'insurancepolicyholderfirstname' => $this->insurancepolicyholderfirstname,
            'insurancepolicyholderlastname' => $this->insurancepolicyholderlastname,
            'insurancepolicyholdermiddlename' => $this->insurancepolicyholdermiddlename,
            'insurancepolicyholdersex' => $this->insurancepolicyholdersex,
            'insurancepolicyholderssn' => $this->insurancepolicyholderssn,
            'insurancepolicyholderstate' => $this->insurancepolicyholderstate,
            'insurancepolicyholdersuffix' => $this->insurancepolicyholdersuffix,
            'insurancepolicyholderzip' => $this->insurancepolicyholderzip,
            'insuredentitytypeid' => $this->insuredentitytypeid,
            'issuedate' => $this->issuedate,
            'policynumber' => $this->policynumber,
            'relationshiptoinsuredid' => $this->relationshiptoinsuredid,
            'sequencenumber' => $this->sequencenumber,
            'updateappointments' => $this->updateappointments,
            'validateinsuranceidnumber' => $this->validateinsuranceidnumber,
        ]);
    }
}

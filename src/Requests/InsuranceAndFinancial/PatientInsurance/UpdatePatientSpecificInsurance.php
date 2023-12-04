<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsurance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientSpecificInsurance
 *
 * Updates a patient insurances for a specific patient
 */
class UpdatePatientSpecificInsurance extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $insuranceid insuranceid
     * @param  null|array  $icd9codes CASE POLICY FIELD - A list of ICD9 accepted diagnosis codes. Please note that setting anything in this field will overwrite the current codes, so if you wish to append a code, please specify all of the preexisting codes in addition to the new one. Only available for worker's comp case policies.
     * @param  null|string  $issuedate Set the date that the insurance was issued. This is usually a date in the past year and not in the future.
     * @param  null|array  $icd10codes CASE POLICY FIELD - See documentation for ICD9CODES.
     * @param  null|string  $adjusterfax CASE POLICY FIELD - Fax for the adjuster on this case policy. Only available for auto insurance or worker's comp case policies.
     * @param  null|int  $departmentid If set, we will use the department id in an attempt to add to the local patient.
     * @param  null|string  $policynumber The insurance group number.  This is sometimes present on an insurance card.
     * @param  null|string  $repricername CASE POLICY FIELD - Name for the repricer.  Only available for worker's comp case policies.
     * @param  null|string  $adjusterphone CASE POLICY FIELD - Phone number/other contact info for the adjuster on this case policy.  Only available for auto insurance or worker's comp case policies.
     * @param  null|string  $repricerphone CASE POLICY FIELD - Phone number for the repricer.  Only available for worker's comp case policies.
     * @param  null|string  $caseinjurydate CASE POLICY FIELD - Date of the injury.  Required for auto insurance, legal, and worker's comp case policies. Dates from over a year ago, and dates in the future are not valid.
     * @param  null|string  $expirationdate Set the date that the insurance will expire. This is usually a date within the next year and not in the past.
     * @param  null|string  $insurancephone The phone number for the insurance company. Note: This defaults to the insurance package phone number. If this is set, it will override it. Likewise if blanked out, it will go back to default.
     * @param  null|string  $injuredbodypart CASE POLICY FIELD - Text field for describing the injured body part.  Required for auto insurance case policies.  Also available for worker's comp case policies.
     * @param  null|string  $adjusterlastname CASE POLICY FIELD - Last name of the adjuster on this case policy.  Only available for auto insurance or worker's comp case policies.
     * @param  null|string  $adjusterfirstname CASE POLICY FIELD - First name of the adjuster on this case policy.  Only available for auto insurance or worker's comp case policies.
     * @param  null|string  $autoaccidentstate CASE POLICY FIELD - Two-letter abbreviation for the state in which the auto accident took place. Only meaningful for auto insurance case policies.
     * @param  null|string  $insuranceidnumber ID number for this insurance or case policy.  This is not useful for auto insurance or worker's comp case policies.  For those, please use the insuranceclaimnumber field instead.
     * @param  null|int  $newsequencenumber Update the sequence number. You cannot assign a sequence number to a patient's insurance if that patient already has another insurance active with that sequence number.  Additionally, all lower numbered sequence numbers need to be filled before assigning a higher sequence number.
     * @param  null|string  $descriptionofinjury CASE POLICY FIELD - A description of the injury.  Only available for auto insurance and worker's comp case policies.
     * @param  null|bool  $relatedtoemployment CASE POLICY FIELD - Boolean field indicating whether this case policy is related to the patient's employer.  Required for worker's comp case policies.
     * @param  null|string  $insuranceclaimnumber CASE POLICY FIELD - The auto insurance claim number or the worker's comp claim number.  This is required for those types of case policies.
     * @param  null|string  $insurancepolicyholder Name of the entity who holds this insurance policy. Required if entity type is set to non-person.
     * @param  null|bool  $realtedtoautoaccident CASE POLICY FIELD - Boolean field indicating whether this case policy is related to an auto accident. Required for auto insurance case policies.
     * @param  null|string  $stateofreportedinjury CASE POLICY FIELD - Two-letter state abbreviation for the state this injury was reported in.  Only available for worker's comp case policies.
     * @param  null|bool  $relatedtootheraccident CASE POLICY FIELD - Boolean field indicating whether this case policy is related to another accident.  Only available for worker's comp case policies.
     * @param  null|bool  $anotherpartyresponsible CASE POLICY FIELD - Boolean field indicating if another party was responsible for this accident.
     * @param  null|int  $relationshiptoinsuredid This patient's relationship to the policy holder (as an ID).  See <a href="/workflows/patient-relationship-mapping"> the mapping</a>. Please note that if this is set to 12, Entity Type must be set to 2.
     * @param  null|string  $insurancepolicyholderdob The DOB of the insurance policy holder (mm/dd/yyyy).
     * @param  null|string  $insurancepolicyholdersex The sex of the insurance policy holder.  Except for self-pay, required for new policies.
     * @param  null|string  $insurancepolicyholderssn The SSN of the insurance policy holder.
     * @param  null|string  $insurancepolicyholderzip The zip of the insurance policy holder.
     * @param  null|string  $insurancepolicyholdercity The city of the insurance policy holder.
     * @param  null|string  $insurancepolicyholderstate The state of the insurance policy holder.
     * @param  null|string  $insurancepolicyholdersuffix The suffix of the insurance policy holder.
     * @param  null|string  $insurancepolicyholderaddress1 The first address line of the insurance policy holder.
     * @param  null|string  $insurancepolicyholderaddress2 The second address line of the insurance policy holder.
     * @param  null|string  $insurancepolicyholderlastname The last name of the insurance policy holder.  Except for self-pay, required for new policies.
     * @param  null|string  $insurancepolicyholderfirstname The first name of the insurance policy holder.  Except for self-pay, required for new policies.
     * @param  null|string  $insurancepolicyholdermiddlename The middle name of the insurance policy holder.
     * @param  null|string  $insurancepolicyholdercountrycode The country code (3 letter) of the insurance policy holder.  Either this or insurancepolicyholdercountryiso3166 are acceptable.  Defaults to USA.
     * @param  null|string  $insurancepolicyholdercountryiso3166 The <a href="http://en.wikipedia.org/wiki/ISO_3166-1_alpha-2">ISO 3166</a> country code of the insurance policy holder.  Either this or insurancepolicyholdercountrycode are acceptable.  Defaults to US.
     */
    public function __construct(
        protected int $patientid,
        protected int $insuranceid,
        protected ?array $icd9codes = null,
        protected ?string $issuedate = null,
        protected ?array $icd10codes = null,
        protected ?string $adjusterfax = null,
        protected ?int $departmentid = null,
        protected ?string $policynumber = null,
        protected ?string $repricername = null,
        protected ?string $adjusterphone = null,
        protected ?string $repricerphone = null,
        protected ?string $caseinjurydate = null,
        protected ?string $expirationdate = null,
        protected ?string $insurancephone = null,
        protected ?string $injuredbodypart = null,
        protected ?string $adjusterlastname = null,
        protected ?string $adjusterfirstname = null,
        protected ?string $autoaccidentstate = null,
        protected ?string $insuranceidnumber = null,
        protected ?int $newsequencenumber = null,
        protected ?string $descriptionofinjury = null,
        protected ?string $insuredentitytypeid = null,
        protected ?bool $relatedtoemployment = null,
        protected ?string $insuranceclaimnumber = null,
        protected ?string $insurancepolicyholder = null,
        protected ?bool $realtedtoautoaccident = null,
        protected ?string $stateofreportedinjury = null,
        protected ?bool $relatedtootheraccident = null,
        protected ?bool $anotherpartyresponsible = null,
        protected ?int $relationshiptoinsuredid = null,
        protected ?string $insurancepolicyholderdob = null,
        protected ?string $insurancepolicyholdersex = null,
        protected ?string $insurancepolicyholderssn = null,
        protected ?string $insurancepolicyholderzip = null,
        protected ?string $insurancepolicyholdercity = null,
        protected ?string $insurancepolicyholderstate = null,
        protected ?string $insurancepolicyholdersuffix = null,
        protected ?string $insurancepolicyholderaddress1 = null,
        protected ?string $insurancepolicyholderaddress2 = null,
        protected ?string $insurancepolicyholderlastname = null,
        protected ?string $insurancepolicyholderfirstname = null,
        protected ?string $insurancepolicyholdermiddlename = null,
        protected ?string $insurancepolicyholdercountrycode = null,
        protected ?string $insurancepolicyholdercountryiso3166 = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'icd9codes' => $this->icd9codes,
            'issuedate' => $this->issuedate,
            'icd10codes' => $this->icd10codes,
            'adjusterfax' => $this->adjusterfax,
            'departmentid' => $this->departmentid,
            'policynumber' => $this->policynumber,
            'repricername' => $this->repricername,
            'adjusterphone' => $this->adjusterphone,
            'repricerphone' => $this->repricerphone,
            'caseinjurydate' => $this->caseinjurydate,
            'expirationdate' => $this->expirationdate,
            'insurancephone' => $this->insurancephone,
            'injuredbodypart' => $this->injuredbodypart,
            'adjusterlastname' => $this->adjusterlastname,
            'adjusterfirstname' => $this->adjusterfirstname,
            'autoaccidentstate' => $this->autoaccidentstate,
            'insuranceidnumber' => $this->insuranceidnumber,
            'newsequencenumber' => $this->newsequencenumber,
            'descriptionofinjury' => $this->descriptionofinjury,
            'insuredentitytypeid' => $this->insuredentitytypeid,
            'relatedtoemployment' => $this->relatedtoemployment,
            'insuranceclaimnumber' => $this->insuranceclaimnumber,
            'insurancepolicyholder' => $this->insurancepolicyholder,
            'realtedtoautoaccident' => $this->realtedtoautoaccident,
            'stateofreportedinjury' => $this->stateofreportedinjury,
            'relatedtootheraccident' => $this->relatedtootheraccident,
            'anotherpartyresponsible' => $this->anotherpartyresponsible,
            'relationshiptoinsuredid' => $this->relationshiptoinsuredid,
            'insurancepolicyholderdob' => $this->insurancepolicyholderdob,
            'insurancepolicyholdersex' => $this->insurancepolicyholdersex,
            'insurancepolicyholderssn' => $this->insurancepolicyholderssn,
            'insurancepolicyholderzip' => $this->insurancepolicyholderzip,
            'insurancepolicyholdercity' => $this->insurancepolicyholdercity,
            'insurancepolicyholderstate' => $this->insurancepolicyholderstate,
            'insurancepolicyholdersuffix' => $this->insurancepolicyholdersuffix,
            'insurancepolicyholderaddress1' => $this->insurancepolicyholderaddress1,
            'insurancepolicyholderaddress2' => $this->insurancepolicyholderaddress2,
            'insurancepolicyholderlastname' => $this->insurancepolicyholderlastname,
            'insurancepolicyholderfirstname' => $this->insurancepolicyholderfirstname,
            'insurancepolicyholdermiddlename' => $this->insurancepolicyholdermiddlename,
            'insurancepolicyholdercountrycode' => $this->insurancepolicyholdercountrycode,
            'insurancepolicyholdercountryiso3166' => $this->insurancepolicyholdercountryiso3166,
        ]);
    }
}

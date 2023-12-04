<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ReferralAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateReferralAuth
 *
 * Adds new referral authorizations for a specific patient
 */
class CreateReferralAuth extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/referralauths";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The department ID associated with this authorization.
     * @param  int  $insuranceid The athena patient insurance ID.
     * @param  int  $referringproviderid The athena referring provider ID associated with this authorization.
     * @param  null|array  $appointmentids The appointment ID associated with this authorization.
     * @param  null|string  $expirationdate The expiration date of when the referral authorization is valid.
     * @param  null|array  $icd10diagnosiscodes The ICD10 codes associated with this referral authorization.
     * @param  null|array  $icd9diagnosiscodes The ICD9 codes associated with this referral authorization.
     * @param  null|bool  $noreferralrequired If set to true, then the insurance authorization number is not required.
     * @param  null|string  $note The note attached to this referral authorization.
     * @param  null|string  $notestoprovider The notes for the provider.
     * @param  null|array  $procedurecodes The procedure codes (CPT) associated with this referral authorization. Procedure Codes should be given in double quotes only. Example: ["00770","15000,AS","0147T"]
     * @param  null|string  $referralauthnumber The referral authorization number.  This input can by bypassed with the NOREFERRALREQUIRED parameter.
     * @param  null|bool  $specifiesvisits Determines whether or not this authorization specifies visits.
     * @param  null|string  $startdate The start date of when the referral authorization is valid.
     * @param  null|int  $visitsapproved The number of visits approved by this authorization.
     * @param  null|int  $visitsleft The number of visits remaining from this authorization.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected int $insuranceid,
        protected int $referringproviderid,
        protected ?array $appointmentids = null,
        protected ?string $expirationdate = null,
        protected ?array $icd10diagnosiscodes = null,
        protected ?array $icd9diagnosiscodes = null,
        protected ?bool $noreferralrequired = null,
        protected ?string $note = null,
        protected ?string $notestoprovider = null,
        protected ?array $procedurecodes = null,
        protected ?string $referralauthnumber = null,
        protected ?bool $specifiesvisits = null,
        protected ?string $startdate = null,
        protected ?int $visitsapproved = null,
        protected ?int $visitsleft = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'insuranceid' => $this->insuranceid,
            'referringproviderid' => $this->referringproviderid,
            'appointmentids' => $this->appointmentids,
            'expirationdate' => $this->expirationdate,
            'icd10diagnosiscodes' => $this->icd10diagnosiscodes,
            'icd9diagnosiscodes' => $this->icd9diagnosiscodes,
            'noreferralrequired' => $this->noreferralrequired,
            'note' => $this->note,
            'notestoprovider' => $this->notestoprovider,
            'procedurecodes' => $this->procedurecodes,
            'referralauthnumber' => $this->referralauthnumber,
            'specifiesvisits' => $this->specifiesvisits,
            'startdate' => $this->startdate,
            'visitsapproved' => $this->visitsapproved,
            'visitsleft' => $this->visitsleft,
        ]);
    }
}

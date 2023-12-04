<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ReferralAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateReferralAuth
 *
 * Modifies an existing record for specific referral authorizations
 */
class UpdateReferralAuth extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/referralauths/{$this->referralauthid}";
	}


	/**
	 * @param int $referralauthid referralauthid
	 * @param int $patientid patientid
	 * @param int $insuranceid The athena patient insurance ID.
	 * @param int $departmentid The department ID associated with this authorization.
	 * @param null|string $notes The note attached to this referral authorization.
	 * @param null|bool $visits Determines whether or not this authorization specifies visits.
	 * @param null|string $startdate The start date of when the referral authorization is valid.
	 * @param null|int $visitsleft The number of visits remaining from this authorization.
	 * @param null|array $appointmentids The appointment ID associated with this authorization. Any appointment IDs updated will add on to the list of associated appointments.
	 * @param null|string $expirationdate The expiration date of when the referral authorization is valid.
	 * @param null|array $procedurecodes The procedure codes (CPT) associated with this referral authorization. Any updates will replace the current procedure codes. Procedure Codes should be given in double quotes only. Example: ["00770","15000,AS","0147T"]
	 * @param null|int $visitsapproved The number of visits approved by this authorization.
	 * @param null|string $notestoprovider The notes for the provider.
	 * @param null|array $icd9diagnosiscodes The ICD9 codes associated with this referral authorization. Any updates will replace the current ICD9 diagnosis codes. Updates to ICD9DIAGNOSISCODES must also be made in tandem with ICD10DIAGNOSISCODES. If ICD10 codes are not passed in along, existing ones will be removed.
	 * @param null|bool $noreferralrequired If set to true, then the insurance authorization number is not required.
	 * @param null|string $referralauthnumber The referral authorization number.  If this is passed in, then the REFERRINGPROVIDERID is required. This input can by bypassed with the NOREFERRALREQUIRED parameter.
	 * @param null|array $icd10diagnosiscodes The ICD10 codes associated with this referral authorization. Any updates will replace the current ICD10 diagnosis codes. Updates to ICD10DIAGNOSISCODES must also be made in tandem with ICD9DIAGNOSISCODES. IF ICD9 codes are not passed in along, existing ones will be removed
	 * @param null|int $referringproviderid The athena referring provider ID associated with this authorization. Required if REFERRALAUTHNUMBER is passed in.
	 */
	public function __construct(
		protected int $referralauthid,
		protected int $patientid,
		protected int $insuranceid,
		protected int $departmentid,
		protected ?string $notes = null,
		protected ?bool $visits = null,
		protected ?string $startdate = null,
		protected ?int $visitsleft = null,
		protected ?array $appointmentids = null,
		protected ?string $expirationdate = null,
		protected ?array $procedurecodes = null,
		protected ?int $visitsapproved = null,
		protected ?string $notestoprovider = null,
		protected ?array $icd9diagnosiscodes = null,
		protected ?bool $noreferralrequired = null,
		protected ?string $referralauthnumber = null,
		protected ?array $icd10diagnosiscodes = null,
		protected ?int $referringproviderid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'insuranceid' => $this->insuranceid,
			'departmentid' => $this->departmentid,
			'notes' => $this->notes,
			'visits' => $this->visits,
			'startdate' => $this->startdate,
			'visitsleft' => $this->visitsleft,
			'appointmentids' => $this->appointmentids,
			'expirationdate' => $this->expirationdate,
			'procedurecodes' => $this->procedurecodes,
			'visitsapproved' => $this->visitsapproved,
			'notestoprovider' => $this->notestoprovider,
			'icd9diagnosiscodes' => $this->icd9diagnosiscodes,
			'noreferralrequired' => $this->noreferralrequired,
			'referralauthnumber' => $this->referralauthnumber,
			'icd10diagnosiscodes' => $this->icd10diagnosiscodes,
			'referringproviderid' => $this->referringproviderid,
		]);
	}
}

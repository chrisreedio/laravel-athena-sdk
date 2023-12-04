<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PrivacyInformationVerification;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientPrivacyInformationVerified
 *
 * Modifies a patient's verified privacy information
 */
class UpdatePatientPrivacyInformationVerified extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/privacyinformationverified";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The ID of the department where the privacy information was verified.
	 * @param string $signaturedatetime If presenting an e-signature, the mm/dd/yyyy hh24:mi:ss formatted time that the signer signed. This is required if a signature name is provided.
	 * @param string $signaturename If presenting an e-siganture, the name the signer typed, up to 100 characters.
	 * @param null|string $expirationdate The date this approval expires (for release of billing information and assignment of benefits).
	 * @param null|bool $insuredsignature If set, this flag sets the Assignment of Benefits privacy checkbox.
	 * @param null|bool $patientsignature If set, this flag sets the Release of Billing Information privacy checkbox.
	 * @param null|bool $privacynotice If set, this flag sets the Privacy Notice privacy checkbox.
	 * @param null|string $reasonpatientunabletosign If the patient is unable to sign a reason why.
	 * @param null|string $signerrelationshiptopatientid If presenting an e-signature, and the signer is signing on behalf of someone else, the relationship of the patient to the signer. There is a documentation page with details.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected string $signaturedatetime,
		protected string $signaturename,
		protected ?string $expirationdate = null,
		protected ?bool $insuredsignature = null,
		protected ?bool $patientsignature = null,
		protected ?bool $privacynotice = null,
		protected ?string $reasonpatientunabletosign = null,
		protected ?string $signerrelationshiptopatientid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'signaturedatetime' => $this->signaturedatetime,
			'signaturename' => $this->signaturename,
			'expirationdate' => $this->expirationdate,
			'insuredsignature' => $this->insuredsignature,
			'patientsignature' => $this->patientsignature,
			'privacynotice' => $this->privacynotice,
			'reasonpatientunabletosign' => $this->reasonpatientunabletosign,
			'signerrelationshiptopatientid' => $this->signerrelationshiptopatientid,
		]);
	}
}

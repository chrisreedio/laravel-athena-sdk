<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\MedicationHistoryConsent;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientMedicationHistoryConsentVerified
 *
 * Create a record of the patient's medication history consent details
 */
class UpdatePatientMedicationHistoryConsentVerified extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/medicationhistoryconsentverified";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The ID of the department where the privacy information was verified.
	 * @param string $signaturedatetime If presenting an e-signature, the mm/dd/yyyy hh24:mi:ss formatted time that the signer signed.  This is required if a signature name is provided.
	 * @param string $signaturename If presenting an e-siganture, the name the signer typed, up to 100 characters
	 * @param null|string $medicationauthorityhistory Indicate whether the patient has granted the authority to download the patient's medication history automatically from pharmacy benefit managers (PBMs). If no value is provided, then 'YES' is used.
	 * @param null|string $medicationhistoryconsentby The person who verified the medication history consent. Accepted values are 'PATIENT' and 'OTHER.'  If no value is provided, then 'PATIENT' is used.
	 * @param null|string $reasonpatientunabletosign If the patient is unable to sign a reason why.
	 * @param null|int $signerrelationshiptopatientid If presenting an e-signature, and the signer is signing on behalf of someone else, the relationship of the patient to the signer.  There is a documentation page with details.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected string $signaturedatetime,
		protected string $signaturename,
		protected ?string $medicationauthorityhistory = null,
		protected ?string $medicationhistoryconsentby = null,
		protected ?string $reasonpatientunabletosign = null,
		protected ?int $signerrelationshiptopatientid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'departmentid' => $this->departmentid,
			'signaturedatetime' => $this->signaturedatetime,
			'signaturename' => $this->signaturename,
			'medicationauthorityhistory' => $this->medicationauthorityhistory,
			'medicationhistoryconsentby' => $this->medicationhistoryconsentby,
			'reasonpatientunabletosign' => $this->reasonpatientunabletosign,
			'signerrelationshiptopatientid' => $this->signerrelationshiptopatientid,
		]);
	}
}

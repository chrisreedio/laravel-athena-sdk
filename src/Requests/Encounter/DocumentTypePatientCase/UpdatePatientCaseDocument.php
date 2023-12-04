<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientCaseDocument
 *
 * Modifies information on a specific patientcase document Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientCaseDocument extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/patientcase/{$this->patientcaseid}";
	}


	/**
	 * @param int $patientcaseid patientcaseid
	 * @param int $patientid patientid
	 * @param null|string $subject The subject of this patient case.
	 * @param null|string $priority Priority of this result.  1 is high; 2 is normal.
	 * @param null|int $providerid The ID of the ordering provider.
	 * @param null|string $callbackname The name of the person to call (if other than patient).
	 * @param null|string $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
	 * @param null|bool $outboundonly True/false flag indicating the patient case requires an outbound phone call and is not a response to an inbound call.
	 * @param null|string $callbacknumber The phone number to use to call back the patient (mutually exclusive with callbacknumbertype).
	 * @param null|string $documentsource Explains where this document originated.
	 * @param null|string $documentsubclass Subclasses for PATIENTCASE documents
	 * @param null|string $callbacknumbertype The phone number type to use to call back the patient (mutually exclusive with callbacknumber).
	 * @param null|int $clinicalproviderid The ID of the external provider/lab/pharmacy associated the document.
	 */
	public function __construct(
		protected int $patientcaseid,
		protected int $patientid,
		protected ?string $subject = null,
		protected ?string $priority = null,
		protected ?int $providerid = null,
		protected ?string $callbackname = null,
		protected ?string $internalnote = null,
		protected ?bool $outboundonly = null,
		protected ?string $callbacknumber = null,
		protected ?string $documentsource = null,
		protected ?string $documentsubclass = null,
		protected ?string $callbacknumbertype = null,
		protected ?int $clinicalproviderid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'subject' => $this->subject,
			'priority' => $this->priority,
			'providerid' => $this->providerid,
			'callbackname' => $this->callbackname,
			'internalnote' => $this->internalnote,
			'outboundonly' => $this->outboundonly,
			'callbacknumber' => $this->callbacknumber,
			'documentsource' => $this->documentsource,
			'documentsubclass' => $this->documentsubclass,
			'callbacknumbertype' => $this->callbacknumbertype,
			'clinicalproviderid' => $this->clinicalproviderid,
		]);
	}
}

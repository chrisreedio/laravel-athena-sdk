<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhysicianAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientPhysicianAuth
 *
 * Modifies a specific physician authorization document information Note: This endpoint may rely on
 * specific settings to be enabled in athenaNet Production to function properly that are not required
 * in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class UpdatePatientPhysicianAuth extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/physicianauth/{$this->physicianauthid}";
	}


	/**
	 * @param int $physicianauthid physicianauthid
	 * @param int $patientid patientid
	 * @param null|string $priority Priority of this result.  1 is high; 2 is normal.
	 * @param null|string $faxnumber Fax number of the sending clinical provider.
	 * @param null|int $providerid The ID of the ordering provider.
	 * @param null|string $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
	 * @param null|int $documenttypeid A specific document type identifier.
	 * @param null|int $clinicalproviderid The ID of the external provider/lab/pharmacy associated the document.
	 */
	public function __construct(
		protected int $physicianauthid,
		protected int $patientid,
		protected ?string $priority = null,
		protected ?string $faxnumber = null,
		protected ?int $providerid = null,
		protected ?string $internalnote = null,
		protected ?int $documenttypeid = null,
		protected ?int $clinicalproviderid = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'priority' => $this->priority,
			'faxnumber' => $this->faxnumber,
			'providerid' => $this->providerid,
			'internalnote' => $this->internalnote,
			'documenttypeid' => $this->documenttypeid,
			'clinicalproviderid' => $this->clinicalproviderid,
		]);
	}
}

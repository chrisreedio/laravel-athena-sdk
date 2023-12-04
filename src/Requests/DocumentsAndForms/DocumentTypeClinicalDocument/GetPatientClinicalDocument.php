<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientClinicalDocument
 *
 * Retrieves a specific clinical document information
 */
class GetPatientClinicalDocument extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/clinicaldocument/{$this->clinicaldocumentid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $clinicaldocumentid clinicaldocumentid
	 * @param null|bool $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
	 * @param null|bool $showccdaxml Default false. If set to true, will include CCDAXML string.
	 */
	public function __construct(
		protected int $patientid,
		protected int $clinicaldocumentid,
		protected ?bool $getentityinfo = null,
		protected ?bool $showccdaxml = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['getentityinfo' => $this->getentityinfo, 'showccdaxml' => $this->showccdaxml]);
	}
}

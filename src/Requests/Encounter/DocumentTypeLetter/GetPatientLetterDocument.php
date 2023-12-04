<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLetter;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientLetterDocument
 *
 * Retrieves a specific letter document information
 */
class GetPatientLetterDocument extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/letter/{$this->letterid}";
	}


	/**
	 * @param int $letterid letterid
	 * @param int $patientid patientid
	 * @param null|bool $excludexml If true, do not return the xml content of this document
	 * @param null|bool $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
	 * @param null|bool $excludehtml If true, do not return the html content of this document
	 */
	public function __construct(
		protected int $letterid,
		protected int $patientid,
		protected ?bool $excludexml = null,
		protected ?bool $getentityinfo = null,
		protected ?bool $excludehtml = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['excludexml' => $this->excludexml, 'getentityinfo' => $this->getentityinfo, 'excludehtml' => $this->excludehtml]);
	}
}

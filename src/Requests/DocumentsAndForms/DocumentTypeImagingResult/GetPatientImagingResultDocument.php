<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientImagingResultDocument
 *
 * Retrieves a specific imaging results document information
 */
class GetPatientImagingResultDocument extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/imagingresult/{$this->imagingresultid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $imagingresultid imagingresultid
	 * @param null|bool $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
	 * @param null|bool $showtemplate If true, interpretation template added to the document is also returned.
	 */
	public function __construct(
		protected int $patientid,
		protected int $imagingresultid,
		protected ?bool $getentityinfo = null,
		protected ?bool $showtemplate = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['getentityinfo' => $this->getentityinfo, 'showtemplate' => $this->showtemplate]);
	}
}

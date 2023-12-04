<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientLabResultDocuments
 *
 * Retrieves a list of lab result document information of a specific patient
 */
class ListPatientLabResultDocuments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/labresult";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|bool $showdeleted By default, deleted documents are not listed.  Set to list these.
	 * @param null|string $status The status of the task to filter document results.
	 * @param null|bool $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
	 * @param null|int $encounterid Show only documents attached to this encounter.
	 * @param null|bool $showtemplate If true, interpretation template added to the document is also returned.
	 * @param null|string $documentsubclass The document subclass to filter document results.
	 * @param null|bool $showportalonly If true, only documents published to the portal at the time of this call are returned.
	 * @param int $departmentid The athenaNet department id.
	 * @param null|bool $showmetadata When "true" is passed we will return filetype, filesize and originalfilename if applicable
	 */
	public function __construct(
		protected int $patientid,
		protected ?bool $showdeleted = null,
		protected ?string $status = null,
		protected ?bool $getentityinfo = null,
		protected ?int $encounterid = null,
		protected ?bool $showtemplate = null,
		protected ?string $documentsubclass = null,
		protected ?bool $showportalonly = null,
		protected int $departmentid,
		protected ?bool $showmetadata = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showdeleted' => $this->showdeleted,
			'status' => $this->status,
			'getentityinfo' => $this->getentityinfo,
			'encounterid' => $this->encounterid,
			'showtemplate' => $this->showtemplate,
			'documentsubclass' => $this->documentsubclass,
			'showportalonly' => $this->showportalonly,
			'departmentid' => $this->departmentid,
			'showmetadata' => $this->showmetadata,
		]);
	}
}

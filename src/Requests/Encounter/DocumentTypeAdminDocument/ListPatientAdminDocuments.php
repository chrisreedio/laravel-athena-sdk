<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAdminDocuments
 *
 * Retrieve a list of patient's admin documents
 */
class ListPatientAdminDocuments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/admin";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|bool $showdeleted By default, deleted documents are not listed.  Set to list these.
	 * @param null|string $status The status of the task to filter document results.
	 * @param int $departmentid The athenaNet department id.
	 * @param null|bool $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
	 * @param null|bool $showmetadata When "true" is passed we will return filetype, filesize and originalfilename if applicable
	 * @param null|int $encounterid Show only documents attached to this encounter.
	 * @param null|string $documentsubclass The document subclass to filter document results.
	 */
	public function __construct(
		protected int $patientid,
		protected ?bool $showdeleted = null,
		protected ?string $status = null,
		protected int $departmentid,
		protected ?bool $getentityinfo = null,
		protected ?bool $showmetadata = null,
		protected ?int $encounterid = null,
		protected ?string $documentsubclass = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showdeleted' => $this->showdeleted,
			'status' => $this->status,
			'departmentid' => $this->departmentid,
			'getentityinfo' => $this->getentityinfo,
			'showmetadata' => $this->showmetadata,
			'encounterid' => $this->encounterid,
			'documentsubclass' => $this->documentsubclass,
		]);
	}
}

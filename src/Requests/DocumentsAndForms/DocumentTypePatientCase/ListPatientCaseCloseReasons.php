<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCaseCloseReasons
 *
 * Retrieves a list of reasons to be used to close patient cases
 */
class ListPatientCaseCloseReasons extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/reference/documents/patientcase/closereasons";
	}


	/**
	 * @param int $patientcaseid denotes the id of the patient case.
	 */
	public function __construct(
		protected int $patientcaseid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['patientcaseid' => $this->patientcaseid]);
	}
}

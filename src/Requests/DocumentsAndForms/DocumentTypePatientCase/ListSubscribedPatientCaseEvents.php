<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSubscribedPatientCaseEvents
 *
 * Retrieves list of events applicable for patient case changed document
 */
class ListSubscribedPatientCaseEvents extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/documents/patientcase/changed/subscription";
	}


	public function __construct()
	{
	}
}

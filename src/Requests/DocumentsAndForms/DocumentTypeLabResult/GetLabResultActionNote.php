<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetLabResultActionNote
 *
 * Retrieves action note information of a specific lab document
 */
class GetLabResultActionNote extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/documents/labresult/{$this->labresultid}/actions";
	}


	/**
	 * @param int $labresultid labresultid
	 */
	public function __construct(
		protected int $labresultid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}

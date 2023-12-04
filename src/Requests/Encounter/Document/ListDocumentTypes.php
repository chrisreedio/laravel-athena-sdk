<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDocumentTypes
 *
 * Retrieves a list of document types based on the documentsubclass filter.
 */
class ListDocumentTypes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/documenttypes";
	}


	/**
	 * @param string $searchvalue The search string as a list of search words.
	 * @param null|string $documentsubclass Limit the results to document types that could apply to a document of the type specified.  If omitted, the results will not be filtered.
	 */
	public function __construct(
		protected string $searchvalue,
		protected ?string $documentsubclass = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['searchvalue' => $this->searchvalue, 'documentsubclass' => $this->documentsubclass]);
	}
}

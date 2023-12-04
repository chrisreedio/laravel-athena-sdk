<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLetter;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListLetterDocumentActions
 *
 * Retrieves action note information of a specific letter
 */
class ListLetterDocumentActions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/documents/letter/{$this->letterid}/actions";
	}


	/**
	 * @param int $letterid letterid
	 */
	public function __construct(
		protected int $letterid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}

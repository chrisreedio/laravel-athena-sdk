<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhoneMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPhoneMessageActions
 *
 * Retrieves action note information of a specific phone message document
 */
class ListPhoneMessageActions extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/documents/phonemessage/{$this->phonemessageid}/actions";
	}


	/**
	 * @param int $phonemessageid phonemessageid
	 */
	public function __construct(
		protected int $phonemessageid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}

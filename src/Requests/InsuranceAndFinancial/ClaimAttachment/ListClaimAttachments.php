<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ClaimAttachment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimAttachments
 *
 * Retrieves a list of claim documents for a specific claim
 */
class ListClaimAttachments extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/claims/{$this->claimid}/attachments";
	}


	/**
	 * @param int $claimid claimid
	 */
	public function __construct(
		protected int $claimid,
	) {
	}
}

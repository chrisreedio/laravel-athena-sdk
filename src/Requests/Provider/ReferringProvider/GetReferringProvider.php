<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetReferringProvider
 *
 * Retrieves information for a specific referring provider
 */
class GetReferringProvider extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/referringproviders/{$this->referringproviderid}";
	}


	/**
	 * @param int $referringproviderid referringproviderid
	 */
	public function __construct(
		protected int $referringproviderid,
	) {
	}
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListReferringProviders
 *
 * Retrieves a list of referring providers
 */
class ListReferringProviders extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/referringproviders";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}

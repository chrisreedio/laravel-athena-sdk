<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\PracticeInfoReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPracticeInfo
 *
 * Retrieves the practice information
 */
class ListPracticeInfo extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/practiceinfo";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}

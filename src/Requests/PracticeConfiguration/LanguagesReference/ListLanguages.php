<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\LanguagesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListLanguages
 *
 * Retrieves a list acceptable languages and their abbreviations
 */
class ListLanguages extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/languages";
	}


	public function __construct()
	{
	}
}

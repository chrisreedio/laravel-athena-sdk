<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\UserInformation;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetUserInfo
 *
 * The OpenID Connect UserInfo Claim
 */
class GetUserInfo extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/userinfo";
	}


	public function __construct()
	{
	}
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ProviderBillingRows;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateProviderBillingRecord
 *
 * Creates a new record for provider billing rows with a call back
 */
class CreateProviderBillingRecord extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/providers/addbillingrows";
	}


	/**
	 * @param string $callbackapihttpmethod http method to invoke
	 * @param string $callbackapipath api suffix to append to the Api Url
	 * @param string $callbackapiuiamscope Scope to pass in when when creating the UIAM Auth token
	 * @param string $callbackapiurlconfkey a lookup key in athenaconf, which needs to be used to fund the environment specific microservice url from athenaconf
	 * @param array $providers The provider ids we want billing rows created for.
	 */
	public function __construct(
		protected string $callbackapihttpmethod,
		protected string $callbackapipath,
		protected string $callbackapiuiamscope,
		protected string $callbackapiurlconfkey,
		protected array $providers,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'callbackapihttpmethod' => $this->callbackapihttpmethod,
			'callbackapipath' => $this->callbackapipath,
			'callbackapiuiamscope' => $this->callbackapiuiamscope,
			'callbackapiurlconfkey' => $this->callbackapiurlconfkey,
			'providers' => $this->providers,
		]);
	}
}

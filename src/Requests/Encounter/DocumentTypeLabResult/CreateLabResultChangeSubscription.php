<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateLabResultChangeSubscription
 *
 * Subscribes for changed lab results events
 */
class CreateLabResultChangeSubscription extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/labresults/changed/subscription";
	}


	/**
	 * @param null|string $eventname By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
	 * @param null|array $departmentids For every New/Update Subscriptions complete list of departmentids should be passed. NOTE: Without DepartmentIDs entire Context/Practice will be subscribed.
	 */
	public function __construct(
		protected ?string $eventname = null,
		protected ?array $departmentids = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['eventname' => $this->eventname, 'departmentids' => $this->departmentids]);
	}
}

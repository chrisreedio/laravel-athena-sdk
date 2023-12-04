<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\ReminderCallSettings;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetReminderCallSettings
 *
 * Retrieves the reminder call settings
 */
class GetReminderCallSettings extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/misc/remindercallsettings";
	}


	/**
	 * @param null|int $departmentid The ID of the department. Required if also passing in the provider ID.
	 * @param null|int $providerid The ID of the provider.
	 */
	public function __construct(
		protected ?int $departmentid = null,
		protected ?int $providerid = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid, 'providerid' => $this->providerid]);
	}
}

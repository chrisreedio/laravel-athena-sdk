<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SocialHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientSocialHistoryTemplates
 *
 * Retrieves a list of selected social history templates for specific patient
 */
class ListPatientSocialHistoryTemplates extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/socialhistory/templates";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department id.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['departmentid' => $this->departmentid]);
	}
}

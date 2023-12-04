<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SocialHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientSocialHistoryTemplates
 *
 * No description
 */
class UpdatePatientSocialHistoryTemplates extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/socialhistory/templates";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department id.
	 * @param string $templateids A comma separated list of template IDs to display in the social history section.
	 */
	public function __construct(
		protected int $patientid,
		protected int $departmentid,
		protected string $templateids,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter(['departmentid' => $this->departmentid, 'templateids' => $this->templateids]);
	}
}

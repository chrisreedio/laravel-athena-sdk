<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SocialHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientSocialHistory
 *
 * Retrieves the social history information of a specific patient
 */
class GetPatientSocialHistory extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/{$this->patientid}/socialhistory";
	}


	/**
	 * @param int $patientid patientid
	 * @param null|string $recipientcategory The intended audience for the data. If given, questions marked as confidential for this audience will be withheld.
	 * @param int $departmentid The athenaNet department id.
	 * @param null|bool $shownotperformedquestions Include questions that the provider did not perform.
	 * @param null|bool $showunansweredquestions Include questions where there is no current answer.
	 */
	public function __construct(
		protected int $patientid,
		protected ?string $recipientcategory = null,
		protected int $departmentid,
		protected ?bool $shownotperformedquestions = null,
		protected ?bool $showunansweredquestions = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'recipientcategory' => $this->recipientcategory,
			'departmentid' => $this->departmentid,
			'shownotperformedquestions' => $this->shownotperformedquestions,
			'showunansweredquestions' => $this->showunansweredquestions,
		]);
	}
}

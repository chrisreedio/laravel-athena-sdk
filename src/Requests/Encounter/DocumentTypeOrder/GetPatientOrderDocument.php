<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientOrderDocument
 *
 * Retrieves a specific order of the patient Note: This endpoint may rely on specific settings to be
 * enabled in athenaNet Production to function properly that are not required in other environments.
 * Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class GetPatientOrderDocument extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/{$this->patientid}/documents/order/{$this->orderid}";
	}


	/**
	 * @param int $patientid patientid
	 * @param int $orderid orderid
	 * @param null|bool $showquestions BETA FIELD: Some order types like labs and imaging orders have additional pertinant information in a question/answer format. Setting this will return that data.
	 * @param null|bool $showpreschedulingchecklist Return any pre-scheduling checklist.
	 * @param null|bool $showstructuredauthorizationdetails BETA FIELD: When set, returns Prior Authorization and insurances for some order types, separately and in a structured version than those returned in showquestions.
	 */
	public function __construct(
		protected int $patientid,
		protected int $orderid,
		protected ?bool $showquestions = null,
		protected ?bool $showpreschedulingchecklist = null,
		protected ?bool $showstructuredauthorizationdetails = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showquestions' => $this->showquestions,
			'showpreschedulingchecklist' => $this->showpreschedulingchecklist,
			'showstructuredauthorizationdetails' => $this->showstructuredauthorizationdetails,
		]);
	}
}

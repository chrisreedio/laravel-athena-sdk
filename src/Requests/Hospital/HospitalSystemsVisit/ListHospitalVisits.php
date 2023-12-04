<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsVisit;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHospitalVisits
 *
 * This endpoint retrieves visits based on a variety of filters.
 */
class ListHospitalVisits extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/visits";
	}


	/**
	 * @param null|bool $showdeleted Boolean flag to include deleted visits in the output.
	 * @param null|bool $nodepartment Boolean flag to include visits where department ID is null.
	 * @param null|bool $showvisitcharges Boolean flag to also return visit charges in the output.
	 * @param null|array $statusids Only return visits that match one of these statuses
	 * @param null|array $visitids Only return these visit IDs.
	 * @param null|int $departmentid Department ID to filter on.
	 * @param null|bool $unregistered Boolean flag to only return visits where the registration has not been completed.
	 * @param null|int $patientid Patient ID to find visits for.
	 * @param null|array $visitcaseids Array of VisitCase IDs to filter on.
	 */
	public function __construct(
		protected ?bool $showdeleted = null,
		protected ?bool $nodepartment = null,
		protected ?bool $showvisitcharges = null,
		protected ?array $statusids = null,
		protected ?array $visitids = null,
		protected ?int $departmentid = null,
		protected ?bool $unregistered = null,
		protected ?int $patientid = null,
		protected ?array $visitcaseids = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showdeleted' => $this->showdeleted,
			'nodepartment' => $this->nodepartment,
			'showvisitcharges' => $this->showvisitcharges,
			'statusids' => $this->statusids,
			'visitids' => $this->visitids,
			'departmentid' => $this->departmentid,
			'unregistered' => $this->unregistered,
			'patientid' => $this->patientid,
			'visitcaseids' => $this->visitcaseids,
		]);
	}
}

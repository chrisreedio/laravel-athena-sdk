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
        return '/visits';
    }

    /**
     * @param  null|int  $departmentid Department ID to filter on.
     * @param  null|bool  $nodepartment Boolean flag to include visits where department ID is null.
     * @param  null|int  $patientid Patient ID to find visits for.
     * @param  null|bool  $showdeleted Boolean flag to include deleted visits in the output.
     * @param  null|bool  $showvisitcharges Boolean flag to also return visit charges in the output.
     * @param  null|array  $statusids Only return visits that match one of these statuses
     * @param  null|bool  $unregistered Boolean flag to only return visits where the registration has not been completed.
     * @param  null|array  $visitcaseids Array of VisitCase IDs to filter on.
     * @param  null|array  $visitids Only return these visit IDs.
     */
    public function __construct(
        protected ?int $departmentid = null,
        protected ?bool $nodepartment = null,
        protected ?int $patientid = null,
        protected ?bool $showdeleted = null,
        protected ?bool $showvisitcharges = null,
        protected ?array $statusids = null,
        protected ?bool $unregistered = null,
        protected ?array $visitcaseids = null,
        protected ?array $visitids = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'nodepartment' => $this->nodepartment,
            'patientid' => $this->patientid,
            'showdeleted' => $this->showdeleted,
            'showvisitcharges' => $this->showvisitcharges,
            'statusids' => $this->statusids,
            'unregistered' => $this->unregistered,
            'visitcaseids' => $this->visitcaseids,
            'visitids' => $this->visitids,
        ]);
    }
}

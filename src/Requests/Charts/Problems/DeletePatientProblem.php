<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientProblem
 *
 * Delete an problem from the patient's active problem list
 */
class DeletePatientProblem extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/problems/{$this->problemid}";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  int  $problemid  problemid
     * @param  null|bool  $remove  Set this to true if a problem was added in error. It will remove the problem from the chart permanently.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected int $problemid,
        protected ?bool $remove = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'remove' => $this->remove,
        ]);
    }
}

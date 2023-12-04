<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\InboxTasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetProviderTaskCounts
 *
 * Retrieves the count of tasks along with the inbox categories assigned to the provider
 */
class GetProviderTaskCounts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/providers/{$this->providerid}/inbox/counts";
    }

    /**
     * @param  int  $providerid providerid
     * @param  null|int  $departmentid The athenaNet department ID for the patient associated tasks. If department ID is passed in then patient ID is also required.
     * @param  null|int  $patientid An athenaNet patient ID. If specified will only retrieve tasks associated with this patient ID. If patient ID is passed in then department ID is also required.
     */
    public function __construct(
        protected int $providerid,
        protected ?int $departmentid = null,
        protected ?int $patientid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
        ]);
    }
}

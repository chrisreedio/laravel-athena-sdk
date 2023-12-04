<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\InboxTasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStaffTasks
 *
 * Retrieves a list of tasks assigned to a specific staff
 */
class ListStaffTasks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/staff/{$this->staffusername}/inbox";
    }

    /**
     * @param  string  $staffusername staffusername
     * @param  null|int  $departmentid The athenaNet department ID for the patient associated tasks. If department ID is passed in then patient ID is also required.
     * @param  null|string  $inboxcategory The inbox category/bucket to filter, all others will be excluded.
     * @param  null|int  $patientid An athenaNet patient ID. If specified will only retrieve tasks associated with this patient ID. If patient ID is passed in then department ID is also required.
     * @param  null|string  $priority Priority to filter, all others will be excluded
     * @param  null|string  $sortorder Order in which the result will be sorted according to created date
     * @param  null|string  $status Status to filter, all others will be excluded
     * @param  null|string  $subtype The document class to filter, all others will be excluded
     */
    public function __construct(
        protected string $staffusername,
        protected ?int $departmentid = null,
        protected ?string $inboxcategory = null,
        protected ?int $patientid = null,
        protected ?string $priority = null,
        protected ?string $sortorder = null,
        protected ?string $status = null,
        protected ?string $subtype = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'inboxcategory' => $this->inboxcategory,
            'patientid' => $this->patientid,
            'priority' => $this->priority,
            'sortorder' => $this->sortorder,
            'status' => $this->status,
            'subtype' => $this->subtype,
        ]);
    }
}

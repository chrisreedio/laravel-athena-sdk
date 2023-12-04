<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\InboxTasks;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListProviderTasks
 *
 * Retrieves a list of tasks assigned to a given provider Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListProviderTasks extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/providers/{$this->providerid}/inbox";
    }

    /**
     * @param  int  $providerid providerid
     * @param  null|string  $priority Priority to filter, all others will be excluded
     * @param  null|string  $subtype The document class to filter, all others will be excluded
     * @param  null|string  $inboxcategory The inbox category/bucket to filter, all others will be excluded.
     * @param  null|string  $status Status to filter, all others will be excluded
     * @param  null|int  $departmentid The athenaNet department ID for the patient associated tasks. If department ID is passed in then patient ID is also required.
     * @param  null|int  $patientid An athenaNet patient ID. If specified will only retrieve tasks associated with this patient ID. If patient ID is passed in then department ID is also required.
     * @param  null|string  $sortorder Order in which the result will be sorted according to created date
     */
    public function __construct(
        protected int $providerid,
        protected ?string $priority = null,
        protected ?string $subtype = null,
        protected ?string $inboxcategory = null,
        protected ?string $status = null,
        protected ?int $departmentid = null,
        protected ?int $patientid = null,
        protected ?string $sortorder = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'priority' => $this->priority,
            'subtype' => $this->subtype,
            'inboxcategory' => $this->inboxcategory,
            'status' => $this->status,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'sortorder' => $this->sortorder,
        ]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaimChanges
 *
 * Retrieves list of modified claims records
 */
class ListClaimChanges extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/claims/changed';
    }

    /**
     * @param  null|array  $departmentid  Department ID. Multiple departments are allowed, either comma separated or with multiple values.
     * @param  null|bool  $leaveunprocessed  For testing purposes, do not mark records as processed
     * @param  null|array  $patientid  Patient ID. Multiple Patient IDs are allowed, either comma separated or with multiple values.
     * @param  null|string  $showprocessedenddatetime  See showprocessedstartdatetime
     * @param  null|string  $showprocessedstartdatetime  Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     * @param  null|bool  $showservicetypeaddons  Include service type add ons for the claim.
     */
    public function __construct(
        protected ?array $departmentid = null,
        protected ?bool $leaveunprocessed = null,
        protected ?array $patientid = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?string $showprocessedstartdatetime = null,
        protected ?bool $showservicetypeaddons = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'leaveunprocessed' => $this->leaveunprocessed,
            'patientid' => $this->patientid,
            'showprocessedenddatetime' => $this->showprocessedenddatetime,
            'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
            'showservicetypeaddons' => $this->showservicetypeaddons,
        ]);
    }
}

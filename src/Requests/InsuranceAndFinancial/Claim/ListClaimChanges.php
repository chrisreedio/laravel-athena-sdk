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
     * @param  null|bool  $leaveunprocessed For testing purposes, do not mark records as processed
     * @param  null|array  $departmentid Department ID. Multiple departments are allowed, either comma separated or with multiple values.
     * @param  null|string  $showprocessedenddatetime See showprocessedstartdatetime
     * @param  null|array  $patientid Patient ID. Multiple Patient IDs are allowed, either comma separated or with multiple values.
     * @param  null|bool  $showservicetypeaddons Include service type add ons for the claim.
     * @param  null|string  $showprocessedstartdatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     */
    public function __construct(
        protected ?bool $leaveunprocessed = null,
        protected ?array $departmentid = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?array $patientid = null,
        protected ?bool $showservicetypeaddons = null,
        protected ?string $showprocessedstartdatetime = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'leaveunprocessed' => $this->leaveunprocessed,
            'departmentid' => $this->departmentid,
            'showprocessedenddatetime' => $this->showprocessedenddatetime,
            'patientid' => $this->patientid,
            'showservicetypeaddons' => $this->showservicetypeaddons,
            'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
        ]);
    }
}

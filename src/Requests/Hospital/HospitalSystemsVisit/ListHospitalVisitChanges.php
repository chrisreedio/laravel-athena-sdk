<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsVisit;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHospitalVisitChanges
 *
 * Retrieves the list of changes in hospital visits
 */
class ListHospitalVisitChanges extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/visits/changed';
    }

    /**
     * @param null|array $departmentid Department ID. Multiple departments are allowed, either comma separated or with multiple values.
     * @param null|bool $leaveunprocessed For testing purposes, do not mark records as processed.
     * @param null|string $showprocessedenddatetime See showprocessedstartdatetime.
     * @param null|string $showprocessedstartdatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     */
    public function __construct(
        protected ?array  $departmentid = null,
        protected ?bool   $leaveunprocessed = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?string $showprocessedstartdatetime = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'leaveunprocessed' => $this->leaveunprocessed,
            'showprocessedenddatetime' => $this->showprocessedenddatetime,
            'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
        ]);
    }
}

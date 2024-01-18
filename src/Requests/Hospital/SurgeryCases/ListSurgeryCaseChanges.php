<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\SurgeryCases;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSurgeryCaseChanges
 *
 * BETA: Retrieves a list of new or updated surgical cases.
 */
class ListSurgeryCaseChanges extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/surgerycases/changed';
    }

    /**
     * @param  null|int  $departmentid  The ID of the department.
     * @param  null|bool  $leaveunprocessed  For testing purposes, do not mark records as processed
     * @param  null|string  $showprocessedenddatetime  See showprocessedstartdatetime
     * @param  null|string  $showprocessedstartdatetime  Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that processed messages will eventually be deleted.
     */
    public function __construct(
        protected ?int $departmentid = null,
        protected ?bool $leaveunprocessed = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?string $showprocessedstartdatetime = null,
    ) {
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

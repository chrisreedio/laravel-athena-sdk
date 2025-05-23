<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientCaseChanges
 *
 * Retrieves a list of modified patient cases
 */
class ListPatientCaseChanges extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/documents/patientcase/changed';
    }

    /**
     * @param  null|bool  $leaveunprocessed  For testing purposes, do not mark records as processed
     * @param  null|array  $patientids  One or more ID's of the Patient
     * @param  null|string  $showprocessedenddatetime  See showprocessedstartdatetime
     * @param  null|string  $showprocessedstartdatetime  Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     */
    public function __construct(
        protected ?bool $leaveunprocessed = null,
        protected ?array $patientids = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?string $showprocessedstartdatetime = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'leaveunprocessed' => $this->leaveunprocessed,
            'patientids' => $this->patientids,
            'showprocessedenddatetime' => $this->showprocessedenddatetime,
            'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
        ]);
    }
}

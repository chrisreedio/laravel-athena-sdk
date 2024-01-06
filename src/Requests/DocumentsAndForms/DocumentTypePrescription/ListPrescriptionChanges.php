<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPrescriptionChanges
 *
 * Retrieves list of records of modified prescription data Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPrescriptionChanges extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/prescriptions/changed';
    }

    /**
     * @param  null|bool  $leaveunprocessed For testing purposes, do not mark records as processed
     * @param  null|string  $showprocessedenddatetime See showprocessedstartdatetime
     * @param  null|string  $showprocessedstartdatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     */
    public function __construct(
        protected ?bool $leaveunprocessed = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?string $showprocessedstartdatetime = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'leaveunprocessed' => $this->leaveunprocessed,
            'showprocessedenddatetime' => $this->showprocessedenddatetime,
            'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
        ]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient;

use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

use function config;

/**
 * ListPatientChanges
 *
 * Retrieve list of changes made to the patient record Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPatientChanges extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'patients';

    public function resolveEndpoint(): string
    {
        return '/patients/changed';
    }

    /**
     * @param  null|array  $confidentialityCode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|array  $departmentId Department ID. Multiple departments are allowed, either comma separated or with multiple values.
     * @param  null|bool  $ignoreRestrictions Patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $leaveUnprocessed For testing purposes, do not mark records as processed.
     * @param  null|array  $patientId Patient ID. Multiple Patient IDs are allowed, either comma separated or with multiple values.
     * @param  null|bool  $returnGlobalId Fetch the Global ID of the patients.
     * @param  null|bool  $showEnterpriseDetails If set, will show the local patient ID, Enterprise ID, provider group ID.
     * @param  null|bool  $showPreviousPatientIds If set, will show the previous patient ID this patient was merged from.
     * @param  null|string  $showProcessedEndDatetime See showprocessestartdatetime.
     * @param  null|string  $showProcessedStartDatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that processed messages will eventually be deleted.
     */
    public function __construct(
        protected ?array $confidentialityCode = null,
        protected ?array $departmentId = null,
        protected ?bool $ignoreRestrictions = null,
        protected ?bool $leaveUnprocessed = null,
        protected ?array $patientId = null,
        protected ?bool $returnGlobalId = null,
        protected ?bool $showEnterpriseDetails = null,
        protected ?bool $showPreviousPatientIds = null,
        protected ?string $showProcessedEndDatetime = null,
        protected ?string $showProcessedStartDatetime = null,
    ) {
    }

    public function defaultQuery(): array
    {
        $leave = config('athena-sdk.leave_unprocessed') ?? $this->leaveUnprocessed;

        return array_filter([
            'confidentialityCode' => $this->confidentialityCode,
            'departmentid' => $this->departmentId,
            'ignorerestrictions' => $this->ignoreRestrictions,
            'leaveunprocessed' => $leave,
            'patientid' => $this->patientId,
            'returnglobalid' => $this->returnGlobalId,
            'showenterprisedetails' => $this->showEnterpriseDetails,
            'showpreviouspatientids' => $this->showPreviousPatientIds,
            'showprocessedenddatetime' => $this->showProcessedEndDatetime,
            'showprocessedstartdatetime' => $this->showProcessedStartDatetime,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        // dd($response->json());
        return collect($response->json($this->itemsKey))
            ->map(fn ($item) => PatientData::fromArray($item))
            ->all();
    }
}

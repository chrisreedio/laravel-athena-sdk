<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use ChrisReedIO\AthenaSDK\Data\Appointment\AppointmentData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

use function collect;
use function config;

/**
 * ListAppointmentChanges
 *
 * Retrieves the list of changes in appointments or appointment slots Note: This endpoint may rely on
 * specific settings to be enabled in athenaNet Production to function properly that are not required
 * in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListAppointmentChanges extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'appointments';

    public function resolveEndpoint(): string
    {
        return '/appointments/changed';
    }

    /**
     * @param  null|array  $confidentialityCode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|array  $departmentId Department ID. Multiple departments are allowed, either comma separated or with multiple values.
     * @param  null|bool  $ignoreRestrictions When showing patient detail for appointments, the patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $leaveUnprocessed For testing purposes, do not mark records as processed.
     * @param  null|array  $patientId Patient ID. Multiple Patient IDs are allowed, either comma separated or with multiple values.
     * @param  null|array  $providerId Provider ID.  Multiple providers are allowed using comma separated values.
     * @param  null|bool  $showClaimDetail Include claim information, if available, associated with an appointment.
     * @param  null|bool  $showCopay Return copay information with the appointment data.
     * @param  null|bool  $showExpectedProcedureCodes Show the expected procedurecodes.
     * @param  null|bool  $showInsurance Include patient insurance information. Shows insurance packages for the appointment if any are selected, and all patient packages otherwise.
     * @param  null|bool  $showPatientDetail Include patient information for each patient associated with an appointment.
     * @param  null|string  $showProcessedEndDatetime See showprocessedstartdatetime.
     * @param  null|string  $showProcessedStartDatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     * @param  null|bool  $showReminderCallDetail Include all remindercall related results, if available, associated with an appointment.
     */
    public function __construct(
        protected ?array $confidentialityCode = null,
        protected ?array $departmentId = null,
        protected ?bool $ignoreRestrictions = null,
        protected ?bool $leaveUnprocessed = null,
        protected ?array $patientId = null,
        protected ?array $providerId = null,
        protected ?bool $showClaimDetail = null,
        protected ?bool $showCopay = null,
        protected ?bool $showExpectedProcedureCodes = null,
        protected ?bool $showInsurance = null,
        protected ?bool $showPatientDetail = null,
        protected ?string $showProcessedEndDatetime = null,
        protected ?string $showProcessedStartDatetime = null,
        protected ?bool $showReminderCallDetail = null,
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
            'providerid' => $this->providerId,
            'showclaimdetail' => $this->showClaimDetail,
            'showcopay' => $this->showCopay,
            'showexpectedprocedurecodes' => $this->showExpectedProcedureCodes,
            'showinsurance' => $this->showInsurance,
            'showpatientdetail' => $this->showPatientDetail,
            'showprocessedenddatetime' => $this->showProcessedEndDatetime,
            'showprocessedstartdatetime' => $this->showProcessedStartDatetime,
            'showremindercalldetail' => $this->showReminderCallDetail,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        dd($response->json());

        return collect($response->json($this->itemsKey))
            ->map(fn ($item) => AppointmentData::fromArray($item))
            ->all();
    }
}

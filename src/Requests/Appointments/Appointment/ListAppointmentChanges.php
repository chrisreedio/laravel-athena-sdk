<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentChanges
 *
 * Retrieves the list of changes in appointments or appointment slots Note: This endpoint may rely on
 * specific settings to be enabled in athenaNet Production to function properly that are not required
 * in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListAppointmentChanges extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/changed';
    }

    /**
     * @param null|array $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param null|array $departmentid Department ID. Multiple departments are allowed, either comma separated or with multiple values.
     * @param null|bool $ignorerestrictions When showing patient detail for appointments, the patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param null|bool $leaveunprocessed For testing purposes, do not mark records as processed.
     * @param null|array $patientid Patient ID. Multiple Patient IDs are allowed, either comma separated or with multiple values.
     * @param null|array $providerid Provider ID.  Multiple providers are allowed using comma separated values.
     * @param null|bool $showclaimdetail Include claim information, if available, associated with an appointment.
     * @param null|bool $showcopay Return copay information with the appointment data.
     * @param null|bool $showexpectedprocedurecodes Show the expected procedurecodes.
     * @param null|bool $showinsurance Include patient insurance information. Shows insurance packages for the appointment if any are selected, and all patient packages otherwise.
     * @param null|bool $showpatientdetail Include patient information for each patient associated with an appointment.
     * @param null|string $showprocessedenddatetime See showprocessedstartdatetime.
     * @param null|string $showprocessedstartdatetime Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     * @param null|bool $showremindercalldetail Include all remindercall related results, if available, associated with an appointment.
     */
    public function __construct(
        protected ?array  $confidentialitycode = null,
        protected ?array  $departmentid = null,
        protected ?bool   $ignorerestrictions = null,
        protected ?bool   $leaveunprocessed = null,
        protected ?array  $patientid = null,
        protected ?array  $providerid = null,
        protected ?bool   $showclaimdetail = null,
        protected ?bool   $showcopay = null,
        protected ?bool   $showexpectedprocedurecodes = null,
        protected ?bool   $showinsurance = null,
        protected ?bool   $showpatientdetail = null,
        protected ?string $showprocessedenddatetime = null,
        protected ?string $showprocessedstartdatetime = null,
        protected ?bool   $showremindercalldetail = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'confidentialitycode' => $this->confidentialitycode,
            'departmentid' => $this->departmentid,
            'ignorerestrictions' => $this->ignorerestrictions,
            'leaveunprocessed' => $this->leaveunprocessed,
            'patientid' => $this->patientid,
            'providerid' => $this->providerid,
            'showclaimdetail' => $this->showclaimdetail,
            'showcopay' => $this->showcopay,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
            'showinsurance' => $this->showinsurance,
            'showpatientdetail' => $this->showpatientdetail,
            'showprocessedenddatetime' => $this->showprocessedenddatetime,
            'showprocessedstartdatetime' => $this->showprocessedstartdatetime,
            'showremindercalldetail' => $this->showremindercalldetail,
        ]);
    }
}

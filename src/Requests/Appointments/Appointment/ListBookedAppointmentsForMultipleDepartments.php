<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use ChrisReedIO\AthenaSDK\Data\Appointment\AppointmentData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use function collect;
use function is_array;

/**
 * ListBookedAppointmentsForMultipleDepartments
 *
 * Retrieves a list of booked appointments across multiple providers and departments Note: This
 * endpoint may rely on specific settings to be enabled in athenaNet Production to function properly
 * that are not required in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListBookedAppointmentsForMultipleDepartments extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'appointments';

    public function resolveEndpoint(): string
    {
        return '/appointments/booked/multipledepartment';
    }

    /**
     * @param  string  $startdate Start of the appointment search date range (mm/dd/yyyy).  Inclusive.
     * @param  string  $enddate End of the appointment search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|string  $appointmentstatus Filter appointments by status.
     * @param  null|int  $appointmenttypeid Filter by appointment type ID.
     * @param  null|array  $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|array  $departmentid The athenaNet department ID. Multiple IDs (either as a comma delimited list or multiple POSTed values) are allowed.
     * @param  null|string  $endlastmodified Identify appointments modified prior to this date/time (mm/dd/yyyy hh:mi:ss).  Inclusive. Note: This can only be used if a startlastmodified value is supplied as well.
     * @param  null|bool  $ignorerestrictions When showing patient detail for appointments, the patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|int  $patientid The athenaNet patient ID.  If operating in a Provider Group Enterprise practice, this should be the enterprise patient ID.
     * @param  null|array  $providerid The athenaNet provider ID.  Multiple IDs (either as a comma delimited list or multiple POSTed values) are allowed.
     * @param  null|string  $scheduledenddate End of the appointment scheduled search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|string  $scheduledstartdate Start of the appointment scheduled search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|bool  $showcancelled Include appointments that have been cancelled.
     * @param  null|bool  $showclaimdetail Include claim information, if available, associated with an appointment.
     * @param  null|bool  $showcopay By default, the expected co-pay is returned. For performance purposes, you can set this to false and copay will not be populated.
     * @param  null|bool  $showexpectedprocedurecodes Show the expetcted procedurecodes.
     * @param  null|bool  $showinsurance Include patient insurance information. Shows insurance packages for the appointment if any are selected, and all patient packages otherwise.
     * @param  null|bool  $showpatientdetail Include patient information for each patient associated with an appointment.
     * @param  null|bool  $showremindercalldetail Include all remindercall related results, if available, associated with an appointment.
     * @param  null|string  $startlastmodified Identify appointments modified after this date/time (mm/dd/yyyy hh:mi:ss).  Inclusive.
     */
    public function __construct(
        protected string $startdate,
        protected string $enddate,
        protected ?string $appointmentstatus = null,
        protected ?int $appointmenttypeid = null,
        protected ?array $confidentialitycode = null,
        protected ?array $departmentid = null,
        protected ?string $endlastmodified = null,
        protected ?bool $ignorerestrictions = null,
        protected ?array $patientid = null,
        protected ?array $providerid = null,
        protected ?string $scheduledenddate = null,
        protected ?string $scheduledstartdate = null,
        protected ?bool $showcancelled = null,
        protected ?bool $showclaimdetail = null,
        protected ?bool $showcopay = null,
        protected ?bool $showexpectedprocedurecodes = null,
        protected ?bool $showinsurance = null,
        protected ?bool $showpatientdetail = null,
        protected ?bool $showremindercalldetail = null,
        protected ?string $startlastmodified = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'appointmentstatus' => $this->appointmentstatus,
            'appointmenttypeid' => $this->appointmenttypeid,
            'confidentialitycode' => $this->confidentialitycode,
            'departmentid' => is_array($this->departmentid) ? implode(',', $this->departmentid) : $this->departmentid,
            'endlastmodified' => $this->endlastmodified,
            'ignorerestrictions' => $this->ignorerestrictions,
            'patientid' => is_array($this->patientid) ? implode(',', $this->patientid) : $this->patientid,
            'providerid' => is_array($this->providerid) ? implode(',', $this->providerid) : $this->providerid,
            'scheduledenddate' => $this->scheduledenddate,
            'scheduledstartdate' => $this->scheduledstartdate,
            'showcancelled' => $this->showcancelled,
            'showclaimdetail' => $this->showclaimdetail,
            'showcopay' => $this->showcopay,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
            'showinsurance' => $this->showinsurance,
            'showpatientdetail' => $this->showpatientdetail,
            'showremindercalldetail' => $this->showremindercalldetail,
            'startlastmodified' => $this->startlastmodified,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        // dd($response->json($this->itemsKey));
        return collect($response->json($this->itemsKey))
            ->map(fn(array $appointment) => AppointmentData::fromArray($appointment))
            ->all();
    }
}

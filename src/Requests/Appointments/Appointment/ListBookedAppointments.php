<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListBookedAppointments
 *
 * Retrieves a list of booked appointments Note: This endpoint may rely on specific settings to be
 * enabled in athenaNet Production to function properly that are not required in other environments.
 * Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListBookedAppointments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/booked';
    }

    /**
     * @param  null|string  $scheduledstartdate Start of the appointment scheduled search date range (mm/dd/yyyy).  Inclusive.
     * @param  string  $startdate Start of the appointment search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|bool  $showinsurance Include patient insurance information. Shows insurance packages for the appointment if any are selected, and all patient packages otherwise.
     * @param  null|bool  $showexpectedprocedurecodes Show the expetcted procedurecodes.
     * @param  null|bool  $ignorerestrictions When showing patient detail for appointments, the patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|int  $appointmenttypeid Filter by appointment type ID.
     * @param  null|string  $endlastmodified Identify appointments modified prior to this date/time (mm/dd/yyyy hh:mi:ss).  Inclusive. Note: This can only be used if a startlastmodified value is supplied as well.
     * @param  string  $enddate End of the appointment search date range (mm/dd/yyyy).  Inclusive.
     * @param  null|array  $providerid The athenaNet provider ID.  Multiple IDs (either as a comma delimited list or multiple POSTed values) are allowed.
     * @param  null|int  $departmentid The athenaNet department ID.
     * @param  null|bool  $showclaimdetail Include claim information, if available, associated with an appointment.
     * @param  null|array  $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|string  $appointmentstatus Filter appointments by status.
     * @param  null|string  $startlastmodified Identify appointments modified after this date/time (mm/dd/yyyy hh:mi:ss).  Inclusive.
     * @param  null|int  $patientid The athenaNet patient ID.  If operating in a Provider Group Enterprise practice, this should be the enterprise patient ID.
     * @param  null|bool  $showcopay By default, the expected co-pay is returned. For performance purposes, you can set this to false and copay will not be populated.
     * @param  null|bool  $showpatientdetail Include patient information for each patient associated with an appointment.
     * @param  null|bool  $showcancelled Include appointments that have been cancelled.
     * @param  null|bool  $showremindercalldetail Include all remindercall related results, if available, associated with an appointment.
     * @param  null|string  $scheduledenddate End of the appointment scheduled search date range (mm/dd/yyyy).  Inclusive.
     */
    public function __construct(
        protected ?string $scheduledstartdate,
        protected string $startdate,
        protected ?bool $showinsurance,
        protected ?bool $showexpectedprocedurecodes,
        protected ?bool $ignorerestrictions,
        protected ?int $appointmenttypeid,
        protected ?string $endlastmodified,
        protected string $enddate,
        protected ?array $providerid = null,
        protected ?int $departmentid = null,
        protected ?bool $showclaimdetail = null,
        protected ?array $confidentialitycode = null,
        protected ?string $appointmentstatus = null,
        protected ?string $startlastmodified = null,
        protected ?int $patientid = null,
        protected ?bool $showcopay = null,
        protected ?bool $showpatientdetail = null,
        protected ?bool $showcancelled = null,
        protected ?bool $showremindercalldetail = null,
        protected ?string $scheduledenddate = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'scheduledstartdate' => $this->scheduledstartdate,
            'startdate' => $this->startdate,
            'showinsurance' => $this->showinsurance,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
            'ignorerestrictions' => $this->ignorerestrictions,
            'appointmenttypeid' => $this->appointmenttypeid,
            'endlastmodified' => $this->endlastmodified,
            'enddate' => $this->enddate,
            'providerid' => $this->providerid,
            'departmentid' => $this->departmentid,
            'showclaimdetail' => $this->showclaimdetail,
            'confidentialitycode' => $this->confidentialitycode,
            'appointmentstatus' => $this->appointmentstatus,
            'startlastmodified' => $this->startlastmodified,
            'patientid' => $this->patientid,
            'showcopay' => $this->showcopay,
            'showpatientdetail' => $this->showpatientdetail,
            'showcancelled' => $this->showcancelled,
            'showremindercalldetail' => $this->showremindercalldetail,
            'scheduledenddate' => $this->scheduledenddate,
        ]);
    }
}

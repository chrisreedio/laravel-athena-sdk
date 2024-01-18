<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientAppointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientAppointment
 *
 * Retrieves a specific appointment for the patient Note: This endpoint may rely on specific settings
 * to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class GetPatientAppointment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/appointments/{$this->appointmentid}";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  int  $patientid  patientid
     * @param  null|array  $confidentialitycode  A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $ignorerestrictions  When showing patient detail for appointments, the patient information for patients with record restrictions and blocked patients will not be shown.  Setting this flag to true will show that information for those patients. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $showclaimdetail  Include claim information, if available, associated with the appointment.
     * @param  null|bool  $showcopay  By default, the expected co-pay is returned. For performance purposes, you can set this to false and copay will not be populated.
     * @param  null|bool  $showexpectedprocedurecodes  Show expected procedure codes
     * @param  null|bool  $showinsurance  Include patient insurance information.
     * @param  null|bool  $showpatientdetail  Include patient information for each patient associated with an appointment.
     * @param  null|bool  $showtelehealth  Show indicator for if this is a native athenatelehealth appointment
     */
    public function __construct(
        protected int $appointmentid,
        protected int $patientid,
        protected ?array $confidentialitycode = null,
        protected ?bool $ignorerestrictions = null,
        protected ?bool $showclaimdetail = null,
        protected ?bool $showcopay = null,
        protected ?bool $showexpectedprocedurecodes = null,
        protected ?bool $showinsurance = null,
        protected ?bool $showpatientdetail = null,
        protected ?bool $showtelehealth = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'confidentialityCode' => $this->confidentialitycode,
            'ignorerestrictions' => $this->ignorerestrictions,
            'showclaimdetail' => $this->showclaimdetail,
            'showcopay' => $this->showcopay,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
            'showinsurance' => $this->showinsurance,
            'showpatientdetail' => $this->showpatientdetail,
            'showtelehealth' => $this->showtelehealth,
        ]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\VitalsHospital;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetStayVitals
 *
 * BETA: Retrieves a list patient vitals reading from inpatient sources for a specific patient stay in
 * the hospital.
 * Note: API lists vital readings, grouped by vital type (height, weight, blood pressure,
 * etc).
 */
class GetStayVitals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/vitals";
    }

    /**
     * @param  int  $stayid  stayid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $enddatetime  Only retrieve vitals that were taking on or before this date and time. Please use the format mm/dd/yyyy hh24:mi:ss.
     * @param  null|bool  $showemptyvitals  Show configured vitals that have no readings for this patient.
     * @param  null|string  $startdatetime  Only retrieve vitals that were taking on or after this date and time. Please use the format mm/dd/yyyy hh24:mi:ss.
     */
    public function __construct(
        protected int $stayid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $enddatetime = null,
        protected ?bool $showemptyvitals = null,
        protected ?string $startdatetime = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'enddatetime' => $this->enddatetime,
            'showemptyvitals' => $this->showemptyvitals,
            'startdatetime' => $this->startdatetime,
        ]);
    }
}

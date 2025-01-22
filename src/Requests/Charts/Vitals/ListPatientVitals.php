<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vitals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientVitals
 *
 * Retrieves the list of Vitals information of a specific patient
 */
class ListPatientVitals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/vitals";
    }

    /**
     * @param  int  $departmentid  The department for this patient. A patient may have multiple charts, and the department determines which chart to retrieve.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $enddate  Only retrieve vitals that were taking on or before this date
     * @param  null|bool  $showemptyvitals  Show configured vitals that have no readings for this patient.
     * @param  null|string  $startdate  Only retrieve vitals that were taking on or after this date
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $enddate = null,
        protected ?bool $showemptyvitals = null,
        protected ?string $startdate = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'enddate' => $this->enddate,
            'showemptyvitals' => $this->showemptyvitals,
            'startdate' => $this->startdate,
        ]);
    }
}

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
     * @param  int  $patientid patientid
     * @param  null|string  $enddate Only retrieve vitals that were taking on or before this date
     * @param  int  $departmentid The department for this patient. A patient may have multiple charts, and the department determines which chart to retrieve.
     * @param  null|string  $startdate Only retrieve vitals that were taking on or after this date
     * @param  null|bool  $showemptyvitals Show configured vitals that have no readings for this patient.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected int $patientid,
        protected ?string $enddate,
        protected int $departmentid,
        protected ?string $startdate = null,
        protected ?bool $showemptyvitals = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'enddate' => $this->enddate,
            'departmentid' => $this->departmentid,
            'startdate' => $this->startdate,
            'showemptyvitals' => $this->showemptyvitals,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
        ]);
    }
}

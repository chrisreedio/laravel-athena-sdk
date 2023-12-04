<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\VitalsHospital;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListActiveStayVitals
 *
 * BETA: Retrieves vitals across all the active stays in the hospital.
 * Note: API lists vital readings,
 * grouped by vital type (height, weight, blood pressure, etc).
 */
class ListActiveStayVitals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/active/vitals';
    }

    /**
     * @param  string  $key Key for the vital group, E.g., HEIGHT. Get the keys using /chart/configuration/vitals
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|string  $enddatetime Only retrieve vitals that were taking on or before this date and time.
     * @param  null|bool  $showemptyvitals Show configured vitals that have no readings for this patient.
     * @param  null|string  $startdatetime Only retrieve vitals that were taking on or after this date and time.
     */
    public function __construct(
        protected string $key,
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
            'key' => $this->key,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'enddatetime' => $this->enddatetime,
            'showemptyvitals' => $this->showemptyvitals,
            'startdatetime' => $this->startdatetime,
        ]);
    }
}

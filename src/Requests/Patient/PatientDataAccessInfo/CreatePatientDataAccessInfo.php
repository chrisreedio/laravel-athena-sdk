<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PatientDataAccessInfo;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientDataAccessInfo
 *
 * BETA: Creates a record of patient data access information
 */
class CreatePatientDataAccessInfo extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/dataaccessinfo";
    }

    /**
     * @param int $patientid patientid
     * @param string $source API call (endpoint name) made to get the data surfaced to the patient.
     * @param string $thirdpartyusername An unverified third party user identification name.
     * @param string $viewdate The date and time the data was surfaced to the patient. Please convert this value to Eastern time and use the format MM/DD/YYYY HH24:MI:SS.
     */
    public function __construct(
        protected int $patientid,
        protected string $source,
        protected string $thirdpartyusername,
        protected string $viewdate,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'source' => $this->source,
            'thirdpartyusername' => $this->thirdpartyusername,
            'viewdate' => $this->viewdate
        ]);
    }
}

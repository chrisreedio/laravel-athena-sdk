<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SurgicalHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientSurgicalHistory
 *
 * Retrieve a list of historical surgeries performed on the specific patient
 */
class GetPatientSurgicalHistory extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/surgicalhistory";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
        ]);
    }
}

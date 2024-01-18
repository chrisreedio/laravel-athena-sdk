<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Stays;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetHospitalStayDetails
 *
 * BETA: Retrieves detail information of a specific patient stay in the hospital including a list of
 * department(s) that the patient was in.
 */
class GetHospitalStayDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}";
    }

    /**
     * @param  int  $stayid  stayid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     */
    public function __construct(
        protected int $stayid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
        ]);
    }
}

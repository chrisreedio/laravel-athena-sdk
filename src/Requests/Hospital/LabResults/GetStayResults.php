<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\LabResults;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetStayResults
 *
 * The lab and imaging results for a given patient stay in the hospital.
 */
class GetStayResults extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/results";
    }

    /**
     * @param  int  $stayid stayid
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected int $stayid,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['THIRDPARTYUSERNAME' => $this->thirdpartyusername, 'PATIENTFACINGCALL' => $this->patientfacingcall]);
    }
}

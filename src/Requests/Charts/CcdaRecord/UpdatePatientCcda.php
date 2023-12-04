<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CcdaRecord;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientCcda
 *
 * Modifies CCDA document for specific patient and chart
 */
class UpdatePatientCcda extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/ccda";
    }

    /**
     * @param  string  $ccda The CCDA in XML format.
     * @param  int  $departmentid The department ID from which to retrieve the patient's chart.
     * @param  int  $patientid patientid
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     */
    public function __construct(
        protected string $ccda,
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'ccda' => $this->ccda,
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
        ]);
    }
}

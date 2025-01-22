<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vitals;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientVitals
 *
 * Retrieves the vital signs data obtained from the patient during the clinical encounter
 */
class GetPatientVitals extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/ccda/{$this->patientid}/vitals";
    }

    /**
     * @param  int  $departmentid  The department from which to retrieve the patient's chart.
     * @param  string  $encounterid  The encounter vitals are associated with.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $enddate  For date filterable items, exclude data after this datetime. Format is MM/DD/YYYY HH24:MM:SS.
     * @param  null|string  $format  Document type.
     * @param  null|string  $startdate  For date filterable items, exclude data before this datetime. Format is MM/DD/YYYY HH24:MM:SS.
     * @param  null|bool  $xmloutput  If set to true, use XML (not JSON) as output.  Not needed if an Accept header with application/xml header is included in the request. If set to false, it will return the CCDA format (XML) wrapped in a JSON response.
     */
    public function __construct(
        protected int $departmentid,
        protected string $encounterid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $enddate = null,
        protected ?string $format = null,
        protected ?string $startdate = null,
        protected ?bool $xmloutput = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'encounterid' => $this->encounterid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'enddate' => $this->enddate,
            'format' => $this->format,
            'startdate' => $this->startdate,
            'xmloutput' => $this->xmloutput,
        ]);
    }
}

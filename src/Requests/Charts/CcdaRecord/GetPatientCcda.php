<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CcdaRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientCcda
 *
 * Retrieves CCDA document for specific patient and chart
 */
class GetPatientCcda extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/ccda";
    }

    /**
     * @param int $departmentid The department from which to retrieve the patient's chart.
     * @param int $patientid patientid
     * @param string $purpose The purpose of this request. The sections returned and required patient consent will depend on the purpose. For now we will only support 'internal', which means it's being requested on behalf of the practice.
     * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param null|string $thirdpartyusername User name of the patient in the third party application.
     * @param null|string $enddate For date filterable items, exclude data after this datetime. Format is MM/DD/YYYY HH24:MM:SS.
     * @param null|string $format There are two subtly different standards for the Transition of Care Ambulatory Summary -- A referral summary (called ambulatory summary here) and a data portability document. They contain the same data, but may have slightly different attributes. For backwards compatibility reasons, we allow both for ambulatory practices. For inpatient practices, this parameter is ignored and only the data portability format is used. In the future, both inpatient and ambulatory will use the data portability format by default. Currently, ambulatory summary is the default for ambulatory settings, but that will switch to data portability in the future, and eventually the ambulatory summary format will be removed, along with this parameter. Also, only with this parameter set to data portability can the startdate and enddate parameters be accepted.
     * @param null|string $startdate For date filterable items, exclude data before this datetime. Format is MM/DD/YYYY HH24:MM:SS.
     * @param null|bool $xmloutput If set to true, use XML (not JSON) as output.  Not needed if an Accept header with application/xml header is included in the request. If set to false, it will return the CCDA format (XML) wrapped in a JSON response.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected string  $purpose,
        protected ?bool   $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $enddate = null,
        protected ?string $format = null,
        protected ?string $startdate = null,
        protected ?bool   $xmloutput = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'purpose' => $this->purpose,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'enddate' => $this->enddate,
            'format' => $this->format,
            'startdate' => $this->startdate,
            'xmloutput' => $this->xmloutput,
        ]);
    }
}

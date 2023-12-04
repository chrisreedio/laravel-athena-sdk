<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CcdaRecord;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetCcdaExport
 *
 * Retrieve CCDA document for specific patient and chart
 */
class GetCcdaExport extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/ccda/{$this->patientid}/ccdaexport";
    }

    /**
     * @param string $documenttype Valid types are DataPortability, ReferralNote, CarePlan, DischargeSummary, and CCD.
     * @param bool $inpatient Inpatient or ambulatory
     * @param int $patientid patientid
     * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param null|string $thirdpartyusername User name of the patient in the third party application.
     * @param null|int $chartsharinggroupid CHARTSHARING GROUP ID.
     * @param null|int $departmentid Department ID.
     * @param null|int $documentid Document ID.
     * @param null|int $encounterid Encounter ID.
     * @param null|string $enddate End date for filtering results within a specific time period. Only for DataPortability document. Example: enddate=2014-01-01T00:00:00
     * @param null|int $enterpriseid ENTERPRISE ID.
     * @param null|string $startdate Start date for filtering results within a specific time period. Only for DataPortability document. Example: startdate=2013-01-01T00:00:00
     * @param null|string $version version USCDI/MU3
     */
    public function __construct(
        protected string  $documenttype,
        protected bool    $inpatient,
        protected int     $patientid,
        protected ?bool   $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?int    $chartsharinggroupid = null,
        protected ?int    $departmentid = null,
        protected ?int    $documentid = null,
        protected ?int    $encounterid = null,
        protected ?string $enddate = null,
        protected ?int    $enterpriseid = null,
        protected ?string $startdate = null,
        protected ?string $version = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'documenttype' => $this->documenttype,
            'inpatient' => $this->inpatient,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'chartsharinggroupid' => $this->chartsharinggroupid,
            'departmentid' => $this->departmentid,
            'documentid' => $this->documentid,
            'encounterid' => $this->encounterid,
            'enddate' => $this->enddate,
            'enterpriseid' => $this->enterpriseid,
            'startdate' => $this->startdate,
            'version' => $this->version,
        ]);
    }
}

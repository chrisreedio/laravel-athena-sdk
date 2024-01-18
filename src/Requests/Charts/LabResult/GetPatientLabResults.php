<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\LabResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientLabResults
 *
 * Retrieves the patients laboratory results.
 */
class GetPatientLabResults extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/labresults";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|int  $allresultsbyencounterid  ID used to return lab results for a specific encounter.
     * @param  null|string  $analyteresultstatus  Filter the results based on the analyte's result status. Since the result status is a free text field, this list is not exhaustive, but does represent a majority of the used statuses.
     * @param  null|string  $enddate  Filter lab orders not individual results that are on or before this date. Example: enddate=1/21/2018. If no enddate is specified, all lab orders found since startdate will be included if specified.
     * @param  null|int  $exactduplicatedocumentid  ID used when the lab results sends the exact same result multiple times.
     * @param  null|bool  $hideduplicate  If true, filters out results that have been marked as an as exact duplicate of another.
     * @param  null|string  $labresultstatus  Filter the results based on the lab result's result status. Since the result status is a free text field, this list is not exhaustive, but does represent a majority of the used statuses.
     * @param  null|bool  $showabnormaldetails  Include the translation of the abnormalflag into HL7 code standards.
     * @param  null|bool  $showhidden  Includes the lab results and analytes marked as hidden. Hidden lab results and analytes are created when they are manually entered, for example on the qm tab or in flowsheets.
     * @param  null|bool  $showportalonly  If true, only documents published to the portal at the time of this call are returned.
     * @param  null|bool  $showtemplate  If true, interpretation template added to the document is also returned.
     * @param  null|string  $startdate  Filter lab orders not individual results that are on or after this date. Example: startdate=6/21/2015. If no startdate is specified, all prior lab orders will be included until enddate if specified.
     * @param  null|int  $supersededdocumentid  ID used when the lab sends a result and later sends a more complete version of the result with additional information.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?int $allresultsbyencounterid = null,
        protected ?string $analyteresultstatus = null,
        protected ?string $enddate = null,
        protected ?int $exactduplicatedocumentid = null,
        protected ?bool $hideduplicate = null,
        protected ?string $labresultstatus = null,
        protected ?bool $showabnormaldetails = null,
        protected ?bool $showhidden = null,
        protected ?bool $showportalonly = null,
        protected ?bool $showtemplate = null,
        protected ?string $startdate = null,
        protected ?int $supersededdocumentid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'allresultsbyencounterid' => $this->allresultsbyencounterid,
            'analyteresultstatus' => $this->analyteresultstatus,
            'enddate' => $this->enddate,
            'exactduplicatedocumentid' => $this->exactduplicatedocumentid,
            'hideduplicate' => $this->hideduplicate,
            'labresultstatus' => $this->labresultstatus,
            'showabnormaldetails' => $this->showabnormaldetails,
            'showhidden' => $this->showhidden,
            'showportalonly' => $this->showportalonly,
            'showtemplate' => $this->showtemplate,
            'startdate' => $this->startdate,
            'supersededdocumentid' => $this->supersededdocumentid,
        ]);
    }
}

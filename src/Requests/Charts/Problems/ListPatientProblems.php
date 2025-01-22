<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientProblems
 *
 * Retrieves patient's active problems list
 */
class ListPatientProblems extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/problems";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|bool  $showdiagnosisinfo  If true, will include every encounter and associated diagnosis with each problem. Also fills the bestmatchicd10code field with the best conversion from the problem SNOMED code to ICD10 code if there is no user-selected ICD10 code in an encounter diagnosis event. Please note that the bestmatchicd10code may not always be accurate.
     * @param  null|bool  $showinactive  Also show inactive (but not soft deleted) problems.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $showdiagnosisinfo = null,
        protected ?bool $showinactive = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'showdiagnosisinfo' => $this->showdiagnosisinfo,
            'showinactive' => $this->showinactive,
        ]);
    }
}

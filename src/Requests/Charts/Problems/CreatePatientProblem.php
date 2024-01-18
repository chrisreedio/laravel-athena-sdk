<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Problems;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientProblem
 *
 * Records a problem in the patient's active problem list
 */
class CreatePatientProblem extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/problems";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  int  $snomedcode  The <a href="http://www.nlm.nih.gov/research/umls/Snomed/snomed_browsers.html">SNOMED code</a> of the problem you are adding.
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $laterality  Update the laterality of this problem. Can be null, LEFT, RIGHT, or BILATERAL.
     * @param  null|string  $note  The note to be attached to this problem.
     * @param  null|string  $startdate  The onset date to be updated for this problem in MM/DD/YYYY format.
     * @param  null|string  $status  Whether the problem is chronic or acute.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected int $snomedcode,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $laterality = null,
        protected ?string $note = null,
        protected ?string $startdate = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'snomedcode' => $this->snomedcode,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'laterality' => $this->laterality,
            'note' => $this->note,
            'startdate' => $this->startdate,
            'status' => $this->status,
        ]);
    }
}

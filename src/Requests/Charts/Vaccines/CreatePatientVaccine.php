<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientVaccine
 *
 * Records a vaccine in the patient's chart in Vaccine section
 */
class CreatePatientVaccine extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/vaccines";
    }

    /**
     * @param  string  $administerdate  Date when this vaccine was administered (if administered). Can be in YYYY, MM/YYYY, or MM/DD/YYYY format.
     * @param  int  $cvx  Vaccine Administered Code
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $ndc  The National Drug Code for the administered vaccine
     */
    public function __construct(
        protected string $administerdate,
        protected int $cvx,
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $ndc = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'administerdate' => $this->administerdate,
            'cvx' => $this->cvx,
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'ndc' => $this->ndc,
        ]);
    }
}

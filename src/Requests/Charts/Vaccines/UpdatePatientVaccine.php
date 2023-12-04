<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientVaccine
 *
 * Modifies the vaccine data of the patient
 */
class UpdatePatientVaccine extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/vaccines/{$this->vaccineid}";
    }

    /**
     * @param  string  $vaccineid vaccineid
     * @param  int  $patientid patientid
     * @param  int  $cvx Vaccine Administered Code
     * @param  int  $departmentid The athenaNet department id.
     * @param  string  $administerdate Date when this vaccine was administered (if administered). Can be in YYYY, MM/YYYY, or MM/DD/YYYY format.
     * @param  null|string  $ndc The National Drug Code for the administered vaccine
     */
    public function __construct(
        protected string $vaccineid,
        protected int $patientid,
        protected int $cvx,
        protected int $departmentid,
        protected string $administerdate,
        protected ?string $ndc = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'cvx' => $this->cvx,
            'departmentid' => $this->departmentid,
            'administerdate' => $this->administerdate,
            'ndc' => $this->ndc,
        ]);
    }
}

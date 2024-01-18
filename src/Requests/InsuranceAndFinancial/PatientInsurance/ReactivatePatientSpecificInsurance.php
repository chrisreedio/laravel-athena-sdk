<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PatientInsurance;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * ReactivatePatientSpecificInsurance
 *
 * Re-activates patient's specific insurance-package
 */
class ReactivatePatientSpecificInsurance extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/reactivate";
    }

    /**
     * @param  int  $insuranceid  insuranceid
     * @param  int  $patientid  patientid
     * @param  null|string  $expirationdate  New date on which this insurance package should expire.
     */
    public function __construct(
        protected int $insuranceid,
        protected int $patientid,
        protected ?string $expirationdate = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['expirationdate' => $this->expirationdate]);
    }
}

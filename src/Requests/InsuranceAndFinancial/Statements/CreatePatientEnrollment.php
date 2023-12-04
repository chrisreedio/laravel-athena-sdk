<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Statements;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientEnrollment
 *
 * For Partial Patient Pay vendors (i.e. when all patients are NOT required to use the third party
 * vendor's services), this API allows the third party vendor to inform athena when a patient has
 * enrolled with their services so that athena can stop sending billing statements to that patient.
 */
class CreatePatientEnrollment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patientpayvendors/{$this->vendorcode}/patientenrollment";
    }

    /**
     * @param  string  $vendorcode vendorcode
     * @param  string  $action Action to take - enroll/unenroll
     * @param  array  $patients List of Patient IDs Example: [123,124]
     */
    public function __construct(
        protected string $vendorcode,
        protected string $action,
        protected array $patients,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['action' => $this->action, 'patients' => $this->patients]);
    }
}

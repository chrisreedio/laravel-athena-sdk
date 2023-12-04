<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\OneYearPaymentContract;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientOneYearContractEmailAgreement
 *
 * Generate an email to the patient and send the Card on File Agreement for one year contracts.
 */
class CreatePatientOneYearContractEmailAgreement extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/oneyear/{$this->contractid}/emailagreement";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $contractid contractid
     * @param  int  $departmentid The id of an active department for the patient.
     * @param  string  $email The email address that we want to send the Card on File Agreement to
     */
    public function __construct(
        protected int $patientid,
        protected int $contractid,
        protected int $departmentid,
        protected string $email,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'email' => $this->email]);
    }
}

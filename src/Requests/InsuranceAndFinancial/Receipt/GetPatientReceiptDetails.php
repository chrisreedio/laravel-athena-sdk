<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientReceiptDetails
 *
 * Retrieves the details of the patient payment receipt
 */
class GetPatientReceiptDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/receipts/{$this->epaymentid}/details";
    }

    /**
     * @param  int  $epaymentid  epaymentid
     * @param  int  $patientid  patientid
     * @param  null|bool  $termsasjson  To include contract terms as JSON object.
     */
    public function __construct(
        protected int $epaymentid,
        protected int $patientid,
        protected ?bool $termsasjson = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['termsasjson' => $this->termsasjson]);
    }
}

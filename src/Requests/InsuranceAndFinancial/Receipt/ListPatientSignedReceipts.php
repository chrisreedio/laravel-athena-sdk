<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientSignedReceipts
 *
 * Retrieves a PDF of the signed receipt image
 */
class ListPatientSignedReceipts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/receipts/{$this->epaymentid}/signed";
    }

    /**
     * @param  int  $epaymentid epaymentid
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $epaymentid,
        protected int $patientid,
    ) {
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientReceiptAuthorization
 *
 * Upload a signed receipt/contract (via multipart/form-data).
 */
class CreatePatientReceiptAuthorization extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/receipts/{$this->epaymentid}/signed";
    }

    /**
     * @param  string  $attachmentcontents  The PDF of the signed receipt. This implies that this is a multipart/form-data content type. This does NOT work correctly in I/O Docs. The filename itself is not used by athenaNet.
     * @param  int  $epaymentid  epaymentid
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected string $attachmentcontents,
        protected int $epaymentid,
        protected int $patientid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['attachmentcontents' => $this->attachmentcontents]);
    }
}

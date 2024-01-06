<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\UpdateReferralOrder;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientReferralOrderClose
 *
 * Closes a referral order
 */
class UpdatePatientReferralOrderClose extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/orders/referral/{$this->referraldocumentid}/close";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $referraldocumentid referraldocumentid
     * @param  null|int  $actionreasonid ID of the document action reason.
     */
    public function __construct(
        protected int $patientid,
        protected int $referraldocumentid,
        protected ?int $actionreasonid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionreasonid' => $this->actionreasonid]);
    }
}

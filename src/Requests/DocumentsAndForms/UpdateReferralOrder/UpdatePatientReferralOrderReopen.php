<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\UpdateReferralOrder;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * UpdatePatientReferralOrderReopen
 *
 * Reopens a closed referral order
 */
class UpdatePatientReferralOrderReopen extends Request
{
    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/orders/referral/{$this->referraldocumentid}/reopen";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $referraldocumentid  referraldocumentid
     */
    public function __construct(
        protected int $patientid,
        protected int $referraldocumentid,
    ) {}
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\StoredCard;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientStoredCard
 *
 * Modifies existing credit card information for a patient
 */
class UpdatePatientStoredCard extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/storedcard/{$this->storedcardid}";
    }

    /**
     * @param  int  $storedcardid storedcardid
     * @param  int  $patientid patientid
     * @param  int  $departmentid The ID of the department where the payment or contract is being collected.
     * @param  bool  $preferredcard Flag to make a STOREDCARD contract the default one for the patient
     */
    public function __construct(
        protected int $storedcardid,
        protected int $patientid,
        protected int $departmentid,
        protected bool $preferredcard,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'preferredcard' => $this->preferredcard]);
    }
}

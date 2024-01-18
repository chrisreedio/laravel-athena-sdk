<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\StoredCard;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientStoredCard
 *
 * Delete the record of a specific credit card of the patient
 */
class DeletePatientStoredCard extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/storedcard/{$this->storedcardid}";
    }

    /**
     * @param  int  $departmentid  The ID of the department where the payment or contract is being collected.
     * @param  int  $patientid  patientid
     * @param  int  $storedcardid  storedcardid
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected int $storedcardid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}

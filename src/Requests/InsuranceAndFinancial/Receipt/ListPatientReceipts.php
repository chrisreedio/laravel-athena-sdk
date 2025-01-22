<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Receipt;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientReceipts
 *
 * Retrieves a list of epayment receipts for a specific patient
 */
class ListPatientReceipts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/receipts";
    }

    /**
     * @param  string  $departmentid  The department ID for the receipts you are looking for.
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected string $departmentid,
        protected int $patientid,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}

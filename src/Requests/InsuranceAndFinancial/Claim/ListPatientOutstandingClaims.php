<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientOutstandingClaims
 *
 * Retrieves outstanding claims for a specific patient
 */
class ListPatientOutstandingClaims extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/claims/patientoutstanding";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|array  $procedurecodes One or more procedure codes
     * @param  null|int  $departmentid The department ID of the service department for the claims being searched for
     */
    public function __construct(
        protected int $patientid,
        protected ?array $procedurecodes = null,
        protected ?int $departmentid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['procedurecodes' => $this->procedurecodes, 'departmentid' => $this->departmentid]);
    }
}

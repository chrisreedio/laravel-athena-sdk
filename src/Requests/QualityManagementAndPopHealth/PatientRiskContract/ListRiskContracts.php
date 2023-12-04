<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\PatientRiskContract;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListRiskContracts
 *
 * Retrieves the patient risk contracts for specific patients
 */
class ListRiskContracts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/riskcontracts';
    }

    /**
     * @param  null|int  $riskcontractid Risk Contract ID
     * @param  null|int  $departmentid Department ID
     */
    public function __construct(
        protected ?int $riskcontractid = null,
        protected ?int $departmentid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['riskcontractid' => $this->riskcontractid, 'departmentid' => $this->departmentid]);
    }
}

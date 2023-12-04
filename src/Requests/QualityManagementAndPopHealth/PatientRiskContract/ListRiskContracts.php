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
     * @param null|int $departmentid Department ID
     * @param null|int $riskcontractid Risk Contract ID
     */
    public function __construct(
        protected ?int $departmentid = null,
        protected ?int $riskcontractid = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'riskcontractid' => $this->riskcontractid
        ]);
    }
}

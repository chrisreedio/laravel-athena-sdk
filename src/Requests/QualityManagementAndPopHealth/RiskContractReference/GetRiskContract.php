<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\RiskContractReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetRiskContract
 *
 * Retrieves the risk contract information
 */
class GetRiskContract extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/populationmanagement/riskcontract';
    }

    /**
     * @param null|string $name Title of the risk contract
     * @param null|int $riskcontractid ID of the risk contract
     */
    public function __construct(
        protected ?string $name = null,
        protected ?int    $riskcontractid = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'name' => $this->name,
            'riskcontractid' => $this->riskcontractid
        ]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\RiskContractReference;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateRiskContract
 *
 * Modifies the risk contract information
 */
class UpdateRiskContract extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/populationmanagement/riskcontract';
    }

    /**
     * @param  null|string  $description  Risk contract description
     * @param  null|string  $name  Risk contract title.
     * @param  null|int  $riskcontractid  Risk contract id.
     */
    public function __construct(
        protected ?string $description = null,
        protected ?string $name = null,
        protected ?int $riskcontractid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'description' => $this->description,
            'name' => $this->name,
            'riskcontractid' => $this->riskcontractid,
        ]);
    }
}

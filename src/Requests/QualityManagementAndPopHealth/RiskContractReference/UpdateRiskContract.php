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
     * @param  null|string  $name Risk contract title.
     * @param  null|string  $description Risk contract description
     * @param  null|int  $riskcontractid Risk contract id.
     */
    public function __construct(
        protected ?string $name = null,
        protected ?string $description = null,
        protected ?int $riskcontractid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['name' => $this->name, 'description' => $this->description, 'riskcontractid' => $this->riskcontractid]);
    }
}

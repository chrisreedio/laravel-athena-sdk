<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\PatientRiskContract;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateRiskContractsBulk
 *
 * Modifies the risk contract status for specific patients
 */
class UpdateRiskContractsBulk extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return '/chart/riskcontracts';
    }

    /**
     * @param  null|array  $patientriskcontracts List of patient risk contracts to update.
     */
    public function __construct(
        protected ?array $patientriskcontracts = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['patientriskcontracts' => $this->patientriskcontracts]);
    }
}

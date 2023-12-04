<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\RiskAdjustment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateRiskAdjustmentGaps
 *
 * Records risk adjustment gaps in the patient's risk tab
 */
class CreateRiskAdjustmentGaps extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/riskgaps/condition';
    }

    /**
     * @param null|array $entry Array of risk gaps to be ingested for patient
     */
    public function __construct(
        protected ?array $entry = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['entry' => $this->entry]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\DiagnosesHospital;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayDiagnoses
 *
 * Retrieve a list of diagnoses for a specific hospital stay
 */
class ListStayDiagnoses extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/diagnoses";
    }

    /**
     * @param  int  $stayid stayid
     */
    public function __construct(
        protected int $stayid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\HpiFindings;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHpiTemplates
 *
 * BETA: Retrieves the configured HPI templates for this encounter
 */
class ListHpiTemplates extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/hpi/templates";
    }

    /**
     * @param  int  $encounterid encounterid
     */
    public function __construct(
        protected int $encounterid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterReasons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListConfiguredEncounterReasons
 *
 * Encounter Reason
 */
class ListConfiguredEncounterReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/configuration/encounterreasons';
    }

    public function __construct() {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

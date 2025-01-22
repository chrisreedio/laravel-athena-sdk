<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\CareTeam;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListRecipientClasses
 *
 * List of recipient specialties accepted for a patient's Care Team
 */
class ListRecipientClasses extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/recipientclasses';
    }

    public function __construct() {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

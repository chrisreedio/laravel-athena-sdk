<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhysicianAuthorization;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPhysicianAuthActions
 *
 * Retrieves action notes information for a specific provider authorization
 */
class ListPhysicianAuthActions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/physicianauth/{$this->physicianauthid}/actions";
    }

    /**
     * @param int $physicianauthid physicianauthid
     */
    public function __construct(
        protected int $physicianauthid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

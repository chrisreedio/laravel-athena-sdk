<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeSurgery;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetSurgeryDocumentActions
 *
 * Retrieves action notes of a specific surgery document
 */
class GetSurgeryDocumentActions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/surgery/{$this->surgeryid}/actions";
    }

    /**
     * @param  int  $surgeryid  surgeryid
     */
    public function __construct(
        protected int $surgeryid,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

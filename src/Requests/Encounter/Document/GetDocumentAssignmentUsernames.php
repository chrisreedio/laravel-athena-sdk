<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDocumentAssignmentUsernames
 *
 * Retrieves the usernames that can be assigned any single document
 */
class GetDocumentAssignmentUsernames extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documentassignment/{$this->documentid}";
    }

    /**
     * @param  int  $documentid  documentid
     */
    public function __construct(
        protected int $documentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

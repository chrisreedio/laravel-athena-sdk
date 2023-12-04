<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeEncounterDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetEncounterDocumentActions
 *
 * Retrieves action note information of a specific encounter document
 */
class GetEncounterDocumentActions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/encounterdocument/{$this->encounterdocumentid}/actions";
    }

    /**
     * @param  int  $encounterdocumentid encounterdocumentid
     */
    public function __construct(
        protected int $encounterdocumentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

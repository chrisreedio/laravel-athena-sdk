<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetClinicalDocumentActions
 *
 * Retrieves action note information of a specific clinical document
 */
class GetClinicalDocumentActions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/clinicaldocument/{$this->clinicaldocumentid}/actions";
    }

    /**
     * @param int $clinicaldocumentid clinicaldocumentid
     */
    public function __construct(
        protected int $clinicaldocumentid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

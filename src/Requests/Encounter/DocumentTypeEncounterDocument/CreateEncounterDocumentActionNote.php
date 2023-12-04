<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeEncounterDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterDocumentActionNote
 *
 * Creates an action note for a specific encounter document
 */
class CreateEncounterDocumentActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/encounterdocument/{$this->encounterdocumentid}/actions";
    }

    /**
     * @param  string  $actionnote The new action note to add to the document.
     * @param  int  $encounterdocumentid encounterdocumentid
     */
    public function __construct(
        protected string $actionnote,
        protected int $encounterdocumentid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}

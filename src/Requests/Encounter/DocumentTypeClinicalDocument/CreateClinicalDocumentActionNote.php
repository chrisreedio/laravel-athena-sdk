<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeClinicalDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateClinicalDocumentActionNote
 *
 * Creates an action note for a specific clinical document
 */
class CreateClinicalDocumentActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/clinicaldocument/{$this->clinicaldocumentid}/actions";
    }

    /**
     * @param  int  $clinicaldocumentid clinicaldocumentid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $clinicaldocumentid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}

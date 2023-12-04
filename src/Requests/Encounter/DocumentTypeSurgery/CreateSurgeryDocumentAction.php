<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeSurgery;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateSurgeryDocumentAction
 *
 * Creates an action note for a specific surgery document
 */
class CreateSurgeryDocumentAction extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/surgery/{$this->surgeryid}/actions";
    }

    /**
     * @param  int  $surgeryid surgeryid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $surgeryid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}

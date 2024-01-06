<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhysicianAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePhysicianAuthAction
 *
 * Creates an action note for a specific physician authorization
 */
class CreatePhysicianAuthAction extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/physicianauth/{$this->physicianauthid}/actions";
    }

    /**
     * @param  string  $actionnote The new action note to add to the document.
     * @param  int  $physicianauthid physicianauthid
     */
    public function __construct(
        protected string $actionnote,
        protected int $physicianauthid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhysicianAuthorization;

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
     * @param  int  $physicianauthid physicianauthid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $physicianauthid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}

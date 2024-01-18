<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLetter;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateLetterDocumentAction
 *
 * Creates an action note for a specific letter
 */
class CreateLetterDocumentAction extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/letter/{$this->letterid}/actions";
    }

    /**
     * @param  string  $actionnote  The new action note to add to the document.
     * @param  int  $letterid  letterid
     */
    public function __construct(
        protected string $actionnote,
        protected int $letterid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}

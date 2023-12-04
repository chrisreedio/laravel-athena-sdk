<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhoneMessage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePhoneMessageAction
 *
 * Creates an action note for a specific phone message document
 */
class CreatePhoneMessageAction extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/phonemessage/{$this->phonemessageid}/actions";
    }

    /**
     * @param  int  $phonemessageid phonemessageid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $phonemessageid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
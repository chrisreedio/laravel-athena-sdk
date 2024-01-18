<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhoneMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPhoneMessage
 *
 * Retrieves specific phone message document information
 */
class GetPhoneMessage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/phonemessage/{$this->phonemessageid}";
    }

    /**
     * @param  int  $phonemessageid  phonemessageid
     */
    public function __construct(
        protected int $phonemessageid,
    ) {
    }
}

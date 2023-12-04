<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInboxMessages
 *
 * Retrieves a list of messages in the patient's inbox
 */
class ListInboxMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/securemessage/inboxmessages";
    }

    /**
     * @param int $patientid patientid
     * @param null|string $showplaintext If Y, returns the TEXT attribute in plaintext.
     */
    public function __construct(
        protected int     $patientid,
        protected ?string $showplaintext = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showplaintext' => $this->showplaintext]);
    }
}

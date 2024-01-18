<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListArchivedMessages
 *
 * Retrieves a list of messages archieved by specific patient
 */
class ListArchivedMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/securemessage/archivedmessages";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  null|string  $showplaintext  If Y, returns the TEXT attribute in plaintext.
     */
    public function __construct(
        protected int $patientid,
        protected ?string $showplaintext = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showplaintext' => $this->showplaintext]);
    }
}

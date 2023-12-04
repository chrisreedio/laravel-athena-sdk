<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListSentMessages
 *
 * Retrieves a list of messages responded or sent by the patient to the practice
 */
class ListSentMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/securemessage/sentmessages";
    }

    /**
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $patientid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

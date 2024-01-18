<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateMessageThreadReply
 *
 * Sends a reply to a specific message-thread
 */
class CreateMessageThreadReply extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/securemessage/{$this->messagethreadid}/reply";
    }

    /**
     * @param  int  $messagethreadid  messagethreadid
     * @param  int  $patientid  patientid
     * @param  string  $text  The body of the reply to send
     */
    public function __construct(
        protected int $messagethreadid,
        protected int $patientid,
        protected string $text,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['text' => $this->text]);
    }
}

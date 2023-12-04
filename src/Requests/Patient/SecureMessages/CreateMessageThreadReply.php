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
     * @param  int  $patientid patientid
     * @param  int  $messagethreadid messagethreadid
     * @param  string  $text The body of the reply to send
     */
    public function __construct(
        protected int $patientid,
        protected int $messagethreadid,
        protected string $text,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['text' => $this->text]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\UserMessage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateUserMessage
 *
 * Sends a message from the specific user to a list of recipients
 */
class CreateUserMessage extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/usermessages/{$this->username}";
    }

    /**
     * @param  string  $message  The body of this message. Limit of 4000 characters.
     * @param  string  $recipientlist  A comma separated list of users to this this message to.
     * @param  string  $subject  The subject of this message. Limit of 80 characters.
     * @param  string  $username  username
     * @param  null|bool  $defaultlink  If set, will use the domain configured for SSO.
     * @param  null|string  $externalid  String identifier to determine where the message came from.
     * @param  null|string  $link  The SSO URL to link to the message.
     * @param  null|string  $linktext  The display text for the URL provided.
     * @param  null|string  $payload  String to identify where the message should link to.
     * @param  null|string  $priority  The priority of this message. Can be NORMAL, HIGH, or LOW. Defaults to NORMAL.
     */
    public function __construct(
        protected string $message,
        protected string $recipientlist,
        protected string $subject,
        protected string $username,
        protected ?bool $defaultlink = null,
        protected ?string $externalid = null,
        protected ?string $link = null,
        protected ?string $linktext = null,
        protected ?string $payload = null,
        protected ?string $priority = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'message' => $this->message,
            'recipientlist' => $this->recipientlist,
            'subject' => $this->subject,
            'defaultlink' => $this->defaultlink,
            'externalid' => $this->externalid,
            'link' => $this->link,
            'linktext' => $this->linktext,
            'payload' => $this->payload,
            'priority' => $this->priority,
        ]);
    }
}

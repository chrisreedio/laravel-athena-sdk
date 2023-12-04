<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\UserMessage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateUserMessage
 *
 * Modifies the specific message as either read by the user or is flagged
 */
class UpdateUserMessage extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/usermessages/{$this->username}/{$this->messageid}";
    }

    /**
     * @param  string  $username username
     * @param  int  $messageid messageid
     * @param  null|bool  $flag Set whether this message is flagged for followup.
     * @param  null|bool  $read Set whether this message is read.
     * @param  null|string  $folder Move the message to this folder. Can be INBOX, SENT, SAVED, TRASH.
     */
    public function __construct(
        protected string $username,
        protected int $messageid,
        protected ?bool $flag = null,
        protected ?bool $read = null,
        protected ?string $folder = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['flag' => $this->flag, 'read' => $this->read, 'folder' => $this->folder]);
    }
}

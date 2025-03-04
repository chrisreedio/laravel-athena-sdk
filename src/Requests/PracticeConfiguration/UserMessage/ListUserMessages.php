<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\UserMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListUserMessages
 *
 * Retrieves a list of messages for a specific username
 */
class ListUserMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/usermessages/{$this->username}";
    }

    /**
     * @param  string  $username  username
     * @param  null|string  $folder  Requested message folder. Can be INBOX, SENT, SAVED, TRASH. Defaults to INBOX.
     * @param  null|bool  $showunreadonly  Only return unread messages. Defaults to false.
     */
    public function __construct(
        protected string $username,
        protected ?string $folder = null,
        protected ?bool $showunreadonly = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'folder' => $this->folder,
            'showunreadonly' => $this->showunreadonly,
        ]);
    }
}

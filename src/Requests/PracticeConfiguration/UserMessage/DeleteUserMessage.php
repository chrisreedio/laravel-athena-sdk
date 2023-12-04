<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\UserMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteUserMessage
 *
 * Deletes the specific user message permanetly
 */
class DeleteUserMessage extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/usermessages/{$this->username}/{$this->messageid}";
    }

    /**
     * @param  string  $username username
     * @param  int  $messageid messageid
     */
    public function __construct(
        protected string $username,
        protected int $messageid,
    ) {
    }
}

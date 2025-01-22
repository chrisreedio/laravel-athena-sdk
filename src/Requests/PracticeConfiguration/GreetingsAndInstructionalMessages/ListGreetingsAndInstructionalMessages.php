<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\GreetingsAndInstructionalMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListGreetingsAndInstructionalMessages
 *
 * No description
 */
class ListGreetingsAndInstructionalMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/greetingsandinstructionalmessages';
    }

    public function __construct() {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\TextMacrosReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListTextMacros
 *
 * Retrieves a list of text macros
 */
class ListTextMacros extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/textmacros';
    }

    /**
     * @param  null|string  $username  The username of the person for which to get the accessible macros.
     */
    public function __construct(
        protected ?string $username = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['username' => $this->username]);
    }
}

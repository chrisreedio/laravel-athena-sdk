<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\JsonEncoding;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * CreateStrictJsonEncodingSetting
 *
 * Configures the setting determining whether or not JSON responses are properly encoded for Booleans,
 * integers, and strings
 */
class CreateStrictJsonEncodingSetting extends Request
{
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/misc/properjsonencoding';
    }

    public function __construct()
    {
    }
}

<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\JsonEncoding;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetStrictJsonEncodingStatus
 *
 * Retrieves the configured setting whether or not JSON responses are properly encoded for Booleans,
 * integers, and strings
 */
class GetStrictJsonEncodingStatus extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/properjsonencoding';
    }

    public function __construct() {}
}

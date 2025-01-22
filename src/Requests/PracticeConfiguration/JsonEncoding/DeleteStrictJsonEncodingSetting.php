<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\JsonEncoding;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeleteStrictJsonEncodingSetting
 *
 * Disables the setting determining JSON responses
 */
class DeleteStrictJsonEncodingSetting extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/misc/properjsonencoding';
    }

    public function __construct() {}
}
